<?php

require 'lib/db.class.php';

$db= new DbMysql();

$credentials = array(
    'hostname' => 'localhost',
    'database' => 'chicago',
    'username' => 'root',
    'password' =>  ''
);
$conexion->connect($credentials);


$RegistrosAMostrar=4;
if(isset($_GET['pag'])){
    $RegistrosAEmpezar=($_GET['pag']-1)*$RegistrosAMostrar;
    $PagAct=$_GET['pag'];
    //caso contrario los iniciamos
}else{
    $RegistrosAEmpezar=0;
    $PagAct=1;
}

//$Resultado=mysql_query("SELECT * FROM empleado ORDER BY nombres LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$con);
$qsearch = 'SELECT	id,sysid,with_size,hight_size FROM idx_info_images ORDER BY id DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar ';
$Resultado = $conexion->query($qsearch);
echo "<table border='1px'>";
foreach ( $Resultado as $k => $MostrarFila) {
    echo "<tr>";
    echo "<td>".$MostrarFila['id']."</td>";
    echo "<td>".$MostrarFila['sysid']."</td>";
    echo "<td>".$MostrarFila['with_size']."</td>";
    echo "<td>".$MostrarFila['hight_size']."</td>";
    echo "</tr>";

}
/*
while($MostrarFila=$Resultado->fecth_array()){            // while ($row_services = $query_services->fetch_array()) {
    echo "<tr>";
    echo "<td>".$MostrarFila['nombres']."</td>";
    echo "<td>".$MostrarFila['departamento']."</td>";
    echo "<td>".$MostrarFila['sueldo']."</td>";
    echo "</tr>";
}*/
echo "</table>";

//******--------determinar las páginas---------******//
$qformat = 'SELECT * FROM idx_info_images ';
$query_num_services = $conexion->query($qformat);
$NroRegistros= count($query_num_services);   //$NroRegistros=mysql_num_rows(mysql_query("SELECT * FROM empleado",$con));
$PagAnt=$PagAct-1;
$PagSig=$PagAct+1;
$PagUlt=$NroRegistros/$RegistrosAMostrar;

//verificamos residuo para ver si llevará decimales
$Res=$NroRegistros%$RegistrosAMostrar;
// si hay residuo usamos funcion floor para que me
// devuelva la parte entera, SIN REDONDEAR, y le sumamos
// una unidad para obtener la ultima pagina
if($Res>0) $PagUlt=floor($PagUlt)+1;

//desplazamiento
echo "<a onclick=\"Pagina('1')\">Primero</a> ";
if($PagAct>1) echo "<a onclick=\"Pagina('$PagAnt')\">Anterior</a> ";
echo "<strong>Pagina ".$PagAct."/".$PagUlt."</strong>";
if($PagAct<$PagUlt)  echo " <a onclick=\"Pagina('$PagSig')\">Siguiente</a> ";
echo "<a onclick=\"Pagina('$PagUlt')\">Ultimo</a>";
?>



























/*
//$query_num_services =  mysql_query("SELECT * FROM idx_info_images ", $conexion);
//$num_total_registros = mysql_num_rows($query_num_services);


$qformat = 'SELECT * FROM idx_info_images ';
$query_num_services = $conexion->query($qformat);
$num_total_registros = count($query_num_services);



//Si hay registros
if ($num_total_registros > 0) {
    //numero de registros por página
    $rowsPerPage = 3;
    //por defecto mostramos la página 1
    $pageNum = 1;

    // si $_GET['page'] esta definido, usamos este número de página
    if(isset($_GET['page'])) {
        sleep(1);
        $pageNum = $_GET['page'];
    }

    //contando el desplazamiento
    $offset = ($pageNum - 1) * $rowsPerPage;
    $total_paginas = ceil($num_total_registros / $rowsPerPage);

    $qsearch = 'SELECT	id,sysid,with_size,hight_size FROM idx_info_images ORDER BY id DESC LIMIT $offset, $rowsPerPage ';
    $query_services = $conexion->query($qsearch);
    while ($row_services = $query_services->fetch_array()) {









    }
    if ($total_paginas > 1) {
        echo '<div class="pagination">';
        echo '<ul>';
        if ($pageNum != 1)
            echo '<li><a class="paginate" data="'.($pageNum-1).'">Anterior</a></li>';
        for ($i=1;$i<=$total_paginas;$i++) {
            if ($pageNum == $i)
                //si muestro el índice de la página actual, no coloco enlace
                echo '<li><a class="paginate">'.$i.'</a></li>';
            else
                //si el índice no corresponde con la página mostrada actualmente,
                //coloco el enlace para ir a esa página
                echo '<li><a class="paginate" data="'.$i.'">'.$i.'</a></li>';
        }
        if ($pageNum != $total_paginas)
            echo '<li><a class="paginate" data="'.($pageNum+1).'">Siguiente</a></li>';
        echo '</ul>';
        echo '</div>';
    }
}

