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
			$sql = "SELECT t_risk.risk_code, t_risk.risk_event, t_risk.risk_level, t_risk.suggested_risk_treatment, 
					t_kri.kri_code, t_kri.key_risk_indicator, t_kri.kri_owner, t_kri.treshold, t_kri.timing_pelaporan, 
					t_kri.owner_report, t_kri.kri_warning 
					FROM t_kri 
					LEFT JOIN t_risk ON t_kri.risk_id=t_risk.risk_id WHERE periode_id='".$periode."'";
			$res = $this->db->query($sql);
			return $res;					
		}		

		public function getoutcome($periode1,$periode2,$level){
			$sql = "SELECT DISTINCT risk_level, 
					(SELECT COUNT(risk_id) FROM t_risk WHERE risk_level ='$level' AND periode_id='$periode1') AS 'rp1' , 
					(SELECT COUNT(risk_id) FROM t_risk WHERE risk_level='$level' AND periode_id='$periode2') AS 'rp2' 
					FROM t_risk WHERE risk_level ='$level'";
			$res = $this->db->query($sql);
			return $res;		
		}	

		public function gettable($periode){
			$sql = "SELECT t1.risk_code, t1.risk_event, t1.risk_description, t1.risk_impact_level, t1.risk_likelihood_key, 
					t1.risk_level AS 'curr', 
					(SELECT t2.risk_level FROM t_risk t2 WHERE t2.risk_id = t1.risk_library_id) AS 'prev' 
					FROM t_risk t1 WHERE t1.periode_id='$periode' AND t1.risk_library_id IS NOT NULL";
			$res = $this->db->query($sql);
			return $res;						
		}	

		public function get2ndcategory($periode,$category){
			$sql = "SELECT DISTINCT t1.risk_2nd_sub_category, t2.cat_name,
					(SELECT COUNT(t3.risk_id) FROM t_risk t3 WHERE t3.risk_impact_level ='Insignificant' AND t3.periode_id=$periode AND t3.risk_2nd_sub_category = t1.risk_2nd_sub_category) AS 'Insignificant',
					(SELECT COUNT(t3.risk_id) FROM t_risk t3 WHERE t3.risk_impact_level ='Minor' AND t3.periode_id=$periode AND t3.risk_2nd_sub_category = t1.risk_2nd_sub_category) AS 'Minor',
					(SELECT COUNT(t3.risk_id) FROM t_risk t3 WHERE t3.risk_impact_level ='Moderate' AND t3.periode_id=$periode AND t3.risk_2nd_sub_category = t1.risk_2nd_sub_category) AS 'Moderate',
					(SELECT COUNT(t3.risk_id) FROM t_risk t3 WHERE t3.risk_impact_level ='Major' AND t3.periode_id=$periode AND t3.risk_2nd_sub_category = t1.risk_2nd_sub_category) AS 'Major',
					(SELECT COUNT(t3.risk_id) FROM t_risk t3 WHERE t3.risk_impact_level ='Catastrophic' AND t3.periode_id=$periode AND t3.risk_2nd_sub_category = t1.risk_2nd_sub_category) AS 'Catastrophic',
					(SELECT COUNT(t3.risk_id) FROM t_risk t3 WHERE t3.risk_likelihood_key ='Very Low' AND t3.periode_id=$periode AND t3.risk_2nd_sub_category = t1.risk_2nd_sub_category) AS 'Very_Low',
					(SELECT COUNT(t3.risk_id) FROM t_risk t3 WHERE t3.risk_likelihood_key ='Low' AND t3.periode_id=$periode AND t3.risk_2nd_sub_category = t1.risk_2nd_sub_category) AS 'Low',
					(SELECT COUNT(t3.risk_id) FROM t_risk t3 WHERE t3.risk_likelihood_key ='Moderate' AND t3.periode_id=$periode AND t3.risk_2nd_sub_category = t1.risk_2nd_sub_category) AS 'Moderate',
					(SELECT COUNT(t3.risk_id) FROM t_risk t3 WHERE t3.risk_likelihood_key ='High' AND t3.periode_id=$periode AND t3.risk_2nd_sub_category = t1.risk_2nd_sub_category) AS 'High',
					(SELECT COUNT(t3.risk_id) FROM t_risk t3 WHERE t3.risk_likelihood_key ='Very High' AND t3.periode_id=$periode AND t3.risk_2nd_sub_category = t1.risk_2nd_sub_category) AS 'Very_High',
					(SELECT COUNT(t3.risk_id) FROM t_risk t3 WHERE t3.risk_level ='Low' AND t3.periode_id=$periode AND t3.risk_2nd_sub_category = t1.risk_2nd_sub_category) AS 'rLow',
					(SELECT COUNT(t3.risk_id) FROM t_risk t3 WHERE t3.risk_level ='Medium' AND t3.periode_id=$periode AND t3.risk_2nd_sub_category = t1.risk_2nd_sub_category) AS 'rMedium',
					(SELECT COUNT(t3.risk_id) FROM t_risk t3 WHERE t3.risk_level ='High' AND t3.periode_id=$periode AND t3.risk_2nd_sub_category = t1.risk_2nd_sub_category) AS 'rHigh'
					FROM t_risk t1 JOIN m_risk_category t2 ON t1.risk_2nd_sub_category = t2.cat_id WHERE risk_2nd_sub_category = $category";
			$res = $this->db->query($sql);
			return $res;									
		}

		public function getRiskLevel($im,$lk){
			$sql = "SELECT risk_level FROM m_risklevel_matrix WHERE impact_value = '$im' AND likelihood_key = '$lk'";
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

		public function getcategory(){
			$query = $this->db->select('cat_id,cat_name')
					 		  ->get('m_risk_category');
			return $query->result();
		}

		public function getcategoryname($cat_id){
			$data = array(
						'cat_id' => $cat_id
					);
			$query = $this->db->select('cat_name,cat_code')
					 		  ->get_where('m_risk_category',$data);
			return $query->result();
		}						
	}
?>