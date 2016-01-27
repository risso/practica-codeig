<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmpleatModel extends CI_Model {
  public function __construct () {
    $this->load->database();
  }
  
  public function getEmpleatPerId ($id) {
        $query = $this->db->get_where('empleats', array('id' => $id));

        $a = array();
        foreach ($query->result_array() as $arr) {
            $a[] = $arr;
        }
        return $a[0];
    }

    public function getEmpleats () {
        $query = $this->db->get('empleats');

        $a = array();
        foreach ($query->result_array() as $arr) {
            $a[] = $arr;
        }
        return $a;
    }

    public function setEmp ($data) {
      $valors = array();
      $valors["nom"] = $data[0];
      $valors["cognom"] = $data[1];
      $valors["dept"] = $data[2];

      $this->db->insert('empleats', $valors);
    }

    public function updateEmp ($data) {
      $valors = array();
      $valors["nom"] = $data[0];
      $valors["cognom"] = $data[1];
      $valors["dept"] = $data[2];
      $valors["id"] = $data[3];

      $this->db->where('id', $valors["id"]);
      $this->db->update('empleats', $valors);
    }

    public function delEmp ($empleats) {
        foreach ($empleats as $value) {
            $this->db->delete('empleats', array('id' => $value));
			//var_dump($value);
        }
    }
  
  
  /*
  
  //  UTILITZANT QUERYS NORMALS, SENSE ACTIVE RECORDS
  
   public function getEmpleats () {
		$query = $this->db->query('select * from empleats');
		
		$a = array();
		foreach ($query->result_array() as $arr) {
		$a[] = $arr; // [] indica que afegirà a l'array per darrera
		}
		return $a;	
	}
	
	public function getDepartaments(){
		$query = $this->db->query('select * from departaments');
		$dpt_array = array();
		if($query->num_rows() > 0){
			
			foreach($query->result() as $row){
				$dpt_array[$row->id] = $row->nom;
			}
		}
		return $dpt_array;
	}
	
	public function setEmp($nom,$cog,$id_dpt){
		$query = $this->db->query("insert into empleats values (null,'$nom','$cog','$id_dpt')");	
	}
	
	public function delEmp($empleats){
		
		foreach($empleats as $value){
			$query = $this->db->query("delete from empleats where id=$value");
			//echo($value);
			//var_dump($value);
		}
	}
	
	*/
	
	
	// FET PER COMPANY
	/*
	public function setEmpleat ($val,$nom) {
		$query = $this->db->query("insert into nombres values ($val,'$nom')");
	} 
  */
    /*s
    public function getNum ($val) {
        $query = $this->db->query("select * from nombres where val=$val");
        return $query->row_array ();
	}
    public function gets () {
		$query = $this->db->query('select * from nombres');
		$a = array();
		foreach ($query->result() as $arr) {
		$a[] = $arr;
		}
		return $a;
	}
  
  public function getsArray () {
		$query = $this->db->query('select * from nombres');
		$a = array();
		foreach ($query->result_array() as $arr) {
		$a[] = $arr;
		}
		return $a;
	}public function adds ($val,$nom) {
		$query = $this->db->query("insert into nombres values ($val,'$nom')");
	}
	*/
    /*public function add($val,$nom) {
        $a = array(
          'val' => $val,
          'nom' => $nom
        );
        $query = $this->db->insert('nombres',$a);
        if($this->db->affected_rows()>0){
            //$this->db->delete('prerregistro', array('id' => $id_pre));
            return true;
        }
        return false;    
	}/*
    
    public function del ($id) {
		if($id==0)
		{
			return false;
		}
		else{
		
			$this->db->trans_begin();

			$this->db->delete('comentarios', array('usuario' => $id));
			$this->db->delete('usuarios', array('id' => $id));

			if ($this->db->trans_status() === FALSE)
			{
				$this->db->trans_rollback();
			}
			else
			{
				$this->db->trans_commit();
			}
			//borrar avatar;
			//borrar imagenes asociadas
			
			
			if($this->db->affected_rows()>0){
				return true;
			}
			return false;
		}
  }
    
    
    public function updateUs($id,$nom,$cognom)
	{
		$data = array(
			'nom' => $nom,
			'cognom' => $cognom
		);

		$this->db->where('id', $id);
		$this->db->update('usuarios', $data);
		if($this->db->affected_rows()>0){
			return true;
		}
		return false;
	}
    
    public function preupdateEmail($id,$usuario,$password)
	{
		$query = $this->db->query("select * from prerregistro where usuario='$usuario'");
		if($query->num_rows>0)
		{
			return false;
		}else
		{
			$a = array(
			'usuario' => $usuario,
			'password' => $password,
			'clave' => $id
			);
			$query = $this->db->insert('prerregistro',$a);
			$b = array(
			'usuario' => $usuario,
			);

			$this->db->where('id', $id);
			$this->db->update('usuarios', $b);
			if($this->db->affected_rows()>0){
				return true;
			}
			return false;
		}
	}
    
    public function udpateAvatar($id,$avatar)
    {
        $data = array(
          'avatar' => $avatar
        );
	
	   $this->db->where('id', $id);
	   $this->db->update('usuarios', $data);
        if($this->db->affected_rows()>0){
            return true;
        }
		return false;
    }
    
    public function udpatePass($id,$pass)
    {
        $data = array(
          'password' => $pass
        );
	
	   $this->db->where('id', $id);
	   $this->db->update('usuarios', $data);
        if($this->db->affected_rows()>0){
            return true;
        }
            return false;
    }*/
}
