<?php namespace App\Models\Master;

use CodeIgniter\Model;

class RelationModel extends Model
{
	protected $table = 'tbl_relation';
	protected $useTimestamps = true;
	protected $allowedFields = ['class_group_id', 'subject_id', 'teacher_id', 'is_active'];

	public function get_relation($class_id = false)
	{
		if ($class_id==false) {
			$this->select('tbl_relation.*, tbl_class_group.class_group_name, tbl_subjects.subject_name, users.fullname');
			$this->join('tbl_class_group', 'tbl_class_group.id = tbl_relation.class_group_id');
			$this->join('tbl_subjects', 'tbl_subjects.id = tbl_relation.subject_id');
			$this->join('users', 'users.id = tbl_relation.teacher_id');
		}else{
			$this->select('tbl_relation.*, tbl_class_group.class_group_name, tbl_subjects.subject_name, users.fullname');
			$this->join('tbl_class_group', 'tbl_class_group.id = tbl_relation.class_group_id');
			$this->join('tbl_subjects', 'tbl_subjects.id = tbl_relation.subject_id');
			$this->join('users', 'users.id = tbl_relation.teacher_id');
			$this->where(['tbl_class_group.id' => $class_id]);
		}

		$this->orderBy('tbl_relation.id ASC','tbl_relation.teacher_id ASC', 'tbl_relation.class_group_id ASC', 'tbl_relation.subject_id ASC');
		$query = $this->get();
		return $query->getResultArray();
	}

	public function get_relation_detail($rel_id)
	{
		$this->select('*');
		$this->where('tbl_relation.id', $rel_id);
		return $this->first();
	}

	public function get_relation_user()
	{

		$this->select('tbl_relation.*, tbl_class_group.class_group_name, tbl_subjects.subject_name, users.fullname');
		$this->join('tbl_class_group', 'tbl_class_group.id = tbl_relation.class_group_id');
		$this->join('tbl_subjects', 'tbl_subjects.id = tbl_relation.subject_id');
		$this->join('users', 'users.id = tbl_relation.teacher_id');
		if (in_groups('teacher')) {
			$this->where(['tbl_relation.teacher_id' => user()->id]);
		}

		$this->orderBy('tbl_relation.id ASC','tbl_relation.teacher_id ASC', 'tbl_relation.class_group_id ASC', 'tbl_relation.subject_id ASC');
		$query = $this->get();
		return $query->getResultArray();
	}

}
?>