<?php
	
        require($CFG->common_libdir . "/entidades_v_1.3/object.php");
	
	$entidad =& new entity();
	$entidad->set("db",$db);

	$entidad->set("name",basename(__FILE__,".php"));
	$entidad->set("labelModule","IES Websites");
	$entidad->set("table",$entidad->get("name"));
	$entidad->set("orderBy","fecha");
	$entidad->set("orderByMode","DESC");

	include("style.php");
	$entidad->set("formColumns",1);

// ---------- Vinculos a muchos  ----------------

// ---------- ATRIBUTOS          ----------------

	$atributo=new attribute($entidad);
	$atributo->set("field","codigo_ies"); 
	$atributo->set("label","C&oacute;digo Instituci&oacute;n");
	$atributo->set("inputType","select");
	$atributo->set("foreignTable","ies");
	$atributo->set("foreignLabelFields","ies.nombre");
	$atributo->set("sqlType","smallint(6)");
	$atributo->set("mandatory",TRUE);
	$atributo->set("editable",TRUE);
	$atributo->set("searchable",TRUE);
	$atributo->set("browseable",TRUE);
	$atributo->set("shortList",TRUE);
	$entidad->addAttribute($atributo);
        
        $atributo=new attribute($entidad);
	$atributo->set("field","fecha");
	$atributo->set("label","Fecha de Revisi&oacute;n");
	$atributo->set("sqlType","date");
	$atributo->set("defaultValue",date("Y-m-d"));
	$atributo->set("mandatory",TRUE);
	$atributo->set("inputSize","35");
	$atributo->set("editable",TRUE);
	$atributo->set("searchable",TRUE);
	$atributo->set("browseable",TRUE);
	$atributo->set("shortList",TRUE);
	$entidad->addAttribute($atributo);
        
        $atributo=new attribute($entidad);
	$atributo->set("field","valores_pecuniarios");
	$atributo->set("label","Valores derechos pecuniarios");
	$atributo->set("inputType","arraySelect");
	$atributo->set("arrayValues",array("1"=>"Dif&iacute;cil","2"=>"Medio","3"=>"F&aacute;cil","4"=>"Home","-1"=>"No Publica"));
	$atributo->set("sqlType","tinyint(4)");
	$atributo->set("mandatory",TRUE);
	$atributo->set("editable",TRUE);
	$atributo->set("searchable",TRUE);
	$atributo->set("browseable",FALSE);
	$atributo->set("shortList",FALSE);
	$entidad->addAttribute($atributo);
        
        $atributo=new attribute($entidad);
	$atributo->set("field","actos_pecuniarios");
	$atributo->set("label","Actos internos que aprobaron los valores derechos pecuniarios");
	$atributo->set("inputType","arraySelect");
	$atributo->set("arrayValues",array("1"=>"Dif&iacute;cil","2"=>"Medio","3"=>"F&aacute;cil","4"=>"Home","-1"=>"No Publica"));
	$atributo->set("sqlType","tinyint(4)");
	$atributo->set("mandatory",TRUE);
	$atributo->set("editable",TRUE);
	$atributo->set("searchable",TRUE);
	$atributo->set("browseable",FALSE);
	$atributo->set("shortList",FALSE);
	$entidad->addAttribute($atributo);
        
        $atributo=new attribute($entidad);
	$atributo->set("field","incremento_pecuniarios");
	$atributo->set("label","Incremento de los valores derechos pecuniarios");
	$atributo->set("inputType","arraySelect");
	$atributo->set("arrayValues",array("1"=>"Dif&iacute;cil","2"=>"Medio","3"=>"F&aacute;cil","4"=>"Home","-1"=>"No Publica"));
	$atributo->set("sqlType","tinyint(4)");
	$atributo->set("mandatory",TRUE);
	$atributo->set("editable",TRUE);
	$atributo->set("searchable",TRUE);
	$atributo->set("browseable",FALSE);
	$atributo->set("shortList",FALSE);
	$entidad->addAttribute($atributo);
        
        $atributo=new attribute($entidad);
	$atributo->set("field","justificacion");
	$atributo->set("label","Justificaci&oacute;n del incremento superior al IPC (IES privadas)");
	$atributo->set("inputType","arraySelect");
	$atributo->set("arrayValues",array("0"=>"No Aplica","1"=>"Dif&iacute;cil","2"=>"Medio","3"=>"F&aacute;cil","4"=>"Home","-1"=>"No Publica"));
	$atributo->set("sqlType","tinyint(4)");
	$atributo->set("mandatory",TRUE);
	$atributo->set("editable",TRUE);
	$atributo->set("searchable",TRUE);
	$atributo->set("browseable",FALSE);
	$atributo->set("shortList",FALSE);
	$entidad->addAttribute($atributo);
        
        $atributo=new attribute($entidad);
	$atributo->set("field","estatuto_general");
	$atributo->set("label","Estatuto general");
	$atributo->set("inputType","arraySelect");
	$atributo->set("arrayValues",array("1"=>"Dif&iacute;cil","2"=>"Medio","3"=>"F&aacute;cil","4"=>"Home","-1"=>"No Publica"));
	$atributo->set("sqlType","tinyint(4)");
	$atributo->set("mandatory",TRUE);
	$atributo->set("editable",TRUE);
	$atributo->set("searchable",TRUE);
	$atributo->set("browseable",FALSE);
	$atributo->set("shortList",FALSE);
	$entidad->addAttribute($atributo);
        
        $atributo=new attribute($entidad);
	$atributo->set("field","reglamento");
	$atributo->set("label","Reglamento estudiantil");
	$atributo->set("inputType","arraySelect");
	$atributo->set("arrayValues",array("1"=>"Dif&iacute;cil","2"=>"Medio","3"=>"F&aacute;cil","4"=>"Home","-1"=>"No Publica"));
	$atributo->set("sqlType","tinyint(4)");
	$atributo->set("mandatory",TRUE);
	$atributo->set("editable",TRUE);
	$atributo->set("searchable",TRUE);
	$atributo->set("browseable",FALSE);
	$atributo->set("shortList",FALSE);
	$entidad->addAttribute($atributo);
        
        $atributo=new attribute($entidad);
	$atributo->set("field","estatuto_docente");
	$atributo->set("label","Estatuto docente");
	$atributo->set("inputType","arraySelect");
	$atributo->set("arrayValues",array("1"=>"Dif&iacute;cil","2"=>"Medio","3"=>"F&aacute;cil","4"=>"Home","-1"=>"No Publica"));
	$atributo->set("sqlType","tinyint(4)");
	$atributo->set("mandatory",TRUE);
	$atributo->set("editable",TRUE);
	$atributo->set("searchable",TRUE);
	$atributo->set("browseable",FALSE);
	$atributo->set("shortList",FALSE);
	$entidad->addAttribute($atributo);
        
        $atributo=new attribute($entidad);
	$atributo->set("field","estatuto_bienestar");
	$atributo->set("label","Estatuto bienestar institucional");
	$atributo->set("inputType","arraySelect");
	$atributo->set("arrayValues",array("1"=>"Dif&iacute;cil","2"=>"Medio","3"=>"F&aacute;cil","4"=>"Home","-1"=>"No Publica"));
	$atributo->set("sqlType","tinyint(4)");
	$atributo->set("mandatory",TRUE);
	$atributo->set("editable",TRUE);
	$atributo->set("searchable",TRUE);
	$atributo->set("browseable",FALSE);
	$atributo->set("shortList",FALSE);
	$entidad->addAttribute($atributo);
        
        $atributo=new attribute($entidad);
	$atributo->set("field","estatuto_contratacion");
	$atributo->set("label","Estatuto contrataci&oacute;n (IES oficiales)");
	$atributo->set("inputType","arraySelect");
	$atributo->set("arrayValues",array("0"=>"No Aplica","1"=>"Dif&iacute;cil","2"=>"Medio","3"=>"F&aacute;cil","4"=>"Home","-1"=>"No Publica"));
	$atributo->set("sqlType","tinyint(4)");
	$atributo->set("mandatory",TRUE);
	$atributo->set("editable",TRUE);
	$atributo->set("searchable",TRUE);
	$atributo->set("browseable",FALSE);
	$atributo->set("shortList",FALSE);
	$entidad->addAttribute($atributo);
        
        $atributo=new attribute($entidad);
	$atributo->set("field","comentarios");
	$atributo->set("label","Comentarios ");
	$atributo->set("sqlType","text");
	$atributo->set("inputType","textarea");
	$atributo->set("inputSize","70");
	$atributo->set("mandatory",FALSE);
	$atributo->set("editable",TRUE);
	$atributo->set("searchable",TRUE);
	$atributo->set("browseable",TRUE);
	$atributo->set("shortList",FALSE);
	$entidad->addAttribute($atributo);
	
	$entidad->checkSqlStructure(TRUE);
?>
