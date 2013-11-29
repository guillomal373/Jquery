<?php	

        require($CFG->common_libdir . "/entidades_v_1.3/object.php");
	
	$entidad =& new entity();
	$entidad->set("db",$db);

	$entidad->set("name",basename(__FILE__,".php"));
	$entidad->set("labelModule","IES Pautas");
	$entidad->set("table",$entidad->get("name"));
	$entidad->set("orderBy","fecha");
	$entidad->set("orderByMode","DESC");

	include("style.php");
	$entidad->set("formColumns",1);

        
// ---------- Vinculos a muchos  ----------------
        
        $link=new link($entidad);
	$link->set("name","pauta snies");
	$link->set("url",$ME . "?module=ies_pauta_snies");
	$link->set("icon","icon-overview.gif");
	$link->set("description","Codigo(s) SNIES");
	$link->set("field","ies_pauta_snies");
	$link->set("type","iframe");
	$link->set("relatedTable","ies_pauta_snies");
	$link->set("popup",true);
	$entidad->addLink($link);

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
	$atributo->set("field","es_acreditada");
	$atributo->set("label","¿Senala si es una IES acreditada?");
	$atributo->set("inputType","arraySelect");
	$atributo->set("arrayValues",array("1"=>"Si","2"=>"No"));
	$atributo->set("sqlType","tinyint(4)");
	$atributo->set("mandatory",TRUE);
	$atributo->set("editable",TRUE);
	$atributo->set("searchable",TRUE);
	$atributo->set("browseable",FALSE);
	$atributo->set("shortList",FALSE);
	$entidad->addAttribute($atributo);
        
        $atributo=new attribute($entidad);
	$atributo->set("field","nombre_programa");
	$atributo->set("label","Programa Académico");
	$atributo->set("sqlType","character varying(100)");
	$atributo->set("mandatory",TRUE);
	$atributo->set("editable",TRUE);
	$atributo->set("searchable",TRUE);
	$atributo->set("browseable",TRUE);
	$atributo->set("shortList",TRUE);
	$entidad->addAttribute($atributo);
        
        $atributo=new attribute($entidad);
	$atributo->set("field","metodologia");
	$atributo->set("label","Metodolog&iacute;a programa");
	$atributo->set("sqlType","character varying(100)");
	$atributo->set("mandatory",TRUE);
	$atributo->set("editable",TRUE);
	$atributo->set("searchable",TRUE);
	$atributo->set("browseable",TRUE);
	$atributo->set("shortList",FALSE);
	$entidad->addAttribute($atributo);
        
        $atributo=new attribute($entidad);
	$atributo->set("field","ies_vigilada");
	$atributo->set("label","¿Senala expresamente que es una IES sujeta a vigilancia del MEN?");
	$atributo->set("inputType","arraySelect");
	$atributo->set("arrayValues",array("1"=>"Si","2"=>"No"));
	$atributo->set("sqlType","tinyint(4)");
	$atributo->set("mandatory",TRUE);
	$atributo->set("editable",TRUE);
	$atributo->set("searchable",TRUE);
	$atributo->set("browseable",FALSE);
	$atributo->set("shortList",FALSE);
	$entidad->addAttribute($atributo);
        
        $atributo=new attribute($entidad);
	$atributo->set("field","id_municipio"); 
	$atributo->set("label","Ciudad o Municipio de la oferta y/o publicidad");
	$atributo->set("inputType","select");
	$atributo->set("foreignTable","ies_municipios");
	$atributo->set("foreignLabelFields","ies_municipios.nombre");
	$atributo->set("sqlType","smallint(6)");
	$atributo->set("mandatory",TRUE);
	$atributo->set("editable",TRUE);
	$atributo->set("searchable",TRUE);
	$atributo->set("browseable",FALSE);
	$atributo->set("shortList",FALSE);
	$entidad->addAttribute($atributo);
        
        $atributo=new attribute($entidad);
	$atributo->set("field","medio");
	$atributo->set("label","Nombre del medio de comunicaci&oacute;n");
	$atributo->set("ACIdField","m.id");
	$atributo->set("ACLabel","m.nombre");
	$atributo->set("ACFrom","medios m");
	$atributo->set("ACFields","m.nombre");
	$atributo->set("inputType","autocomplete");
	$atributo->set("inputSizeAutocomplete","30");
	$atributo->set("sqlType","int");
	$atributo->set("mandatory",TRUE);
	$atributo->set("editable",TRUE);
	$atributo->set("searchable",TRUE);
	$atributo->set("browseable",FALSE);
	$atributo->set("shortList",FALSE);
	$entidad->addAttribute($atributo);
        
        $atributo=new attribute($entidad);
	$atributo->set("field","link");
	$atributo->set("label","Link");
	$atributo->set("sqlType","character varying(100)");
	$atributo->set("mandatory",FALSE);
	$atributo->set("editable",TRUE);
	$atributo->set("searchable",TRUE);
	$atributo->set("browseable",FALSE);
	$atributo->set("shortList",FALSE);
	$entidad->addAttribute($atributo);
	
        
        $atributo=new attribute($entidad);
	$atributo->set("field","fecha");
	$atributo->set("label","Fecha Publicaci&oacute;n");
	$atributo->set("sqlType","date");
	$atributo->set("defaultValue",date("Y-m-d"));
	$atributo->set("mandatory",TRUE);
	$atributo->set("inputSize","35");
	$atributo->set("editable",TRUE);
	$atributo->set("searchable",TRUE);
	$atributo->set("browseable",FALSE);
	$atributo->set("shortList",FALSE);
	$entidad->addAttribute($atributo);
        
        
        $atributo=new attribute($entidad);
	$atributo->set("field","fecha_r");
	$atributo->set("label","Fecha Revisi&oacute;n");
	$atributo->set("sqlType","date");
	$atributo->set("defaultValue",date("Y-m-d"));
	$atributo->set("mandatory",TRUE);
	$atributo->set("inputSize","35");
	$atributo->set("editable",TRUE);
	$atributo->set("searchable",TRUE);
	$atributo->set("browseable",FALSE);
	$atributo->set("shortList",FALSE);
	$entidad->addAttribute($atributo);

        $atributo=new attribute($entidad);
	$atributo->set("field","archivo");
	$atributo->set("label","Archivo");
	$atributo->set("sqlType","tinyint(4)");
	$atributo->set("inputType","fileFS");
	$atributo->set("mandatory",TRUE);
	$atributo->set("searchable",TRUE);
	$atributo->set("browseable",FALSE);
	$atributo->set("shortList",FALSE);
	$entidad->addAttribute($atributo);
        
        $atributo=new attribute($entidad);
	$atributo->set("field","codigo_snies_existe");
	$atributo->set("label","Codigo del programa se encuentra en SNIES");
	$atributo->set("inputType","arraySelect");
	$atributo->set("arrayValues",array("1"=>"Si","2"=>"No"));
	$atributo->set("sqlType","tinyint(4)");
	$atributo->set("mandatory",TRUE);
	$atributo->set("editable",TRUE);
	$atributo->set("searchable",TRUE);
	$atributo->set("browseable",FALSE);
	$atributo->set("shortList",FALSE);
	$entidad->addAttribute($atributo);
        
        $atributo=new attribute($entidad);
	$atributo->set("field","estado_programa");
	$atributo->set("label","Estado del programa en SNIES");
	$atributo->set("inputType","arraySelect");
	$atributo->set("arrayValues",array("3"=>"No Aplica","1"=>"Activo","2"=>"Inactivo"));
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
