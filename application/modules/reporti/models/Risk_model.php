<?php 
	class Risk_model extends APP_Model {

		public function getAllrisk(){
			$sql = "SELECT m_risk_category.`cat_name`, t_risk.`risk_code`, t_risk.`risk_event`, t_risk.`risk_description`, t_risk.`risk_owner`,
					t_risk.`risk_cause`, t_risk.`risk_impact`, t_risk_control.`risk_existing_control`, t_risk_control.`risk_evaluation_control`,t_risk_control.`risk_control_owner`,t_risk.`risk_impact_level`,
					t_risk.`risk_likelihood_key`,t_risk.`risk_level` 
					FROM t_risk
					LEFT JOIN m_risk_category ON t_risk.`risk_2nd_sub_category` = m_risk_category.`cat_id`
					LEFT JOIN t_risk_control ON t_risk.`risk_id`=t_risk_control.`risk_id`";
			$res = $this->db->query($sql);
			return $res;
		}

		public function getAllriskperiode($periode){
			$sql = "SELECT m_risk_category.`cat_name`, t_risk.`risk_code`, t_risk.`risk_event`, t_risk.`risk_description`, t_risk.`risk_owner`,
					t_risk.`risk_cause`, t_risk.`risk_impact`, t_risk_control.`risk_existing_control`,t_risk_control.`risk_evaluation_control`,t_risk_control.`risk_control_owner`,t_risk.`risk_impact_level`,
					t_risk.`risk_likelihood_key`,t_risk.`risk_level` 
					FROM t_risk
					LEFT JOIN m_risk_category ON t_risk.`risk_2nd_sub_category` = m_risk_category.`cat_id`
					LEFT JOIN t_risk_control ON t_risk.`risk_id`=t_risk_control.`risk_id`
					WHERE t_risk.`periode_id`='".$periode."'";
			$res = $this->db->query($sql);
			return $res;
		}

		public function getActionPlanPeriode($periode){
			$sql = "SELECT t_risk_action_plan.`id`,t_risk_action_plan.`action_plan`,t_risk_action_plan.`due_date`,t_risk_action_plan.`division`, 
					t_risk.`risk_code`, t_risk.`risk_event`, t_risk.`risk_owner`,
					t_risk.`risk_impact_level`,
					t_risk.`risk_likelihood_key`,t_risk.`risk_level` 
					FROM t_risk
					LEFT JOIN t_risk_action_plan ON t_risk.`risk_id` = t_risk_action_plan.`risk_id`
					WHERE t_risk_action_plan.`execution_evidence` IS NULL AND t_risk_action_plan.`execution_explain` IS NULL
					AND t_risk_action_plan.`execution_reason` IS NULL AND t_risk_action_plan.`revised_date` IS NULL AND
					t_risk_action_plan.`action_plan_status` = 4 AND t_risk.`periode_id` = '".$periode."'";
			$res = $this->db->query($sql);
			return $res;					
		}

		public function getRiskTreatment($periode){
			$sql = "SELECT t_risk_action_plan.`action_plan`,t_risk_action_plan.`due_date`,t_risk_action_plan.`division`, 
					t_risk.`risk_code`, t_risk.`risk_event`, t_risk.`risk_owner`,
					t_risk.`risk_impact_level`,
					t_risk.`risk_likelihood_key`,t_risk.`risk_level`,t_risk.`suggested_risk_treatment` 
					FROM t_risk
					LEFT JOIN t_risk_action_plan ON t_risk.`risk_id` = t_risk_action_plan.`risk_id`
					WHERE t_risk.`risk_status` = 6 AND t_risk.`periode_id` = '".$periode."'";
			$res = $this->db->query($sql);
			return $res;
		}	

		public function getTopTenRisk(){
			$sql = "SELECT risk_code, risk_event, risk_description, risk_owner, risk_impact_level, risk_likelihood_key, risk_level,
					COUNT(risk_event)AS jumlah 
					FROM t_risk 
					WHERE risk_level = 'HIGH'
					GROUP BY risk_event ORDER BY jumlah DESC
					LIMIT 10";
			$res = $this->db->query($sql);
			return $res;					
		}

		public function getkri($periode){
			$sql = "SELECT t_risk.risk_id, t_risk.risk_event, t_risk.risk_level, t_risk.suggested_risk_treatment, 
					t_kri.kri_code, t_kri.key_risk_indicator, t_kri.kri_owner, t_kri.treshold, t_kri.timing_pelaporan, 
					t_kri.owner_report, t_kri.kri_warning 
					FROM t_kri 
					LEFT JOIN t_risk ON t_kri.risk_id=t_risk.risk_id WHERE periode_id='".$periode."'";
			$res = $this->db->query($sql);
			return $res;					
		}		

		public function getoutcome($periode,$level){
			$sql = "SELECT DISTINCT risk_level, 
					(SELECT COUNT(risk_id) FROM t_risk WHERE risk_level ='$level' AND periode_id='$periode') AS 'risk of periode 1' , 
					(SELECT COUNT(risk_id) FROM t_risk WHERE risk_level='$level' AND periode_id='$periode') AS 'risk of periode 2' 
					FROM t_risk WHERE risk_level ='$level'";
			$res = $this->db->query($sql);
			return $res;		
		}			

		public function getPeriode($periode){
			$data = array(
						'periode_id' => $periode
					);
			$query = $this->db->select('periode_name,periode_start,periode_end')
					 		  ->get_where('m_periode',$data);
			return $query->result();
		}

		public function getallPeriode(){
			$query = $this->db->select('periode_id,periode_name,periode_start,periode_end')
					 		  ->get('m_periode');
			return $query->result();
		}		
	}
?>