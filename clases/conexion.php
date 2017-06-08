<?php
//PARAMETROS
define('HOST','localhost'); 
define('USER','root');
define('PASS','');
define('DBNAME','bdproyectophp');

class Conexion
{
    protected $conexion;
	public $ultimoId;
    //CREANDO METODO PARA CONECTAR
	public function __construct()
    {
		$this->conexion = mysqli_connect(HOST, USER, PASS,DBNAME);
                mysql_set_charset('utf8');
		if (!$this->conexion) DIE("Lo sentimos, no se ha podido 
					conectar con MySQL: " . mysqli_error());     
		        return true;
	}//Fin del constructor
        
	//CREANDO METODO PARA DESCONECTAR
	public function desconectar()
    {
        if ($this->conexion) {
            mysqli_close($this->conexion);
        }
    }//Fin de desconectar
 
 	//METODO PARA EJECUTARSQL
    public function ejecutarSql($sql)
    {
		$rs = mysqli_query($this->conexion,$sql);
		if(!$rs) echo "Se ha producido un error.<BR> ".$sql;
		
		//Programacion para obtener el ultimo ID procesado
		$sql	= "SELECT last_insert_id();";
		$rsId	= mysqli_query($this->conexion,$sql);
		$id		= mysqli_fetch_row($rsId);
		$this->ultimoId = $id[0];
		
		//retornando valor de rs
		return $rs;
    }//Fin de ejecutar

	//PROGRAMANDO METODO PARA INSERTAR REGISTROS
	public function insertarDB($tabla,$campos,$valores)
	{
		$sql = "INSERT INTO $tabla($campos) VALUES($valores)";
		$rs = $this->ejecutarSql($sql);
		return true;
	}//Fin de Insertar
	
	//PROGRAMANDO METODO PARA ACTUALIZAR
	public function actualizarDB($tabla,$campos,$condicion)
	{
		$sql = "UPDATE $tabla SET 
					$campos 
				WHERE $condicion";

		$rs = $this->ejecutarSql($sql);
		return true;
	}

	//PROGRAMANDO METODO PARA ELIMINAR
	public function eliminarDB($tabla,$condicion)
	{
		$sql = "DELETE FROM $tabla WHERE $condicion";
		$rs = $this->ejecutarSql($sql);
		return true;
	}
	
	//METODO PARA LLENAR SELECT
	public function llenarSelect($nombre,$sql,$indice)
	{
		$rs = $this->ejecutarSql($sql);
		print "<select name='$nombre'id='$nombre' class='form-control'>
					<option value='0'>Selecccionar</option>";
		while($fila=mysqli_fetch_array($rs))
		{
			if($fila[0]==$indice)
				print "<option value='".$fila[0]."' selected>".$fila[1]."</option>";
			else
				print "<option value='".$fila[0]."'>".$fila[1]."</option>";
		}
		print "</select>";
	}//Fin de select	
       
	
	//METODO UTILIZADO PARA RETORNAR EL ULTIMO ID INSERTADO
	public function retornarId()
	{
		return $this->ultimoId;
	}//Fin de retornarId
	
}//Fin de la clase conexion

$bdConexion = new Conexion();
?>
