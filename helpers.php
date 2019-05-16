<?php
function linn_item_type(){
	$itemTypeMeta = array(
		  'name'=> 'Species',
		  'description' => 'An organism or specimen.',
		);

	return $itemTypeMeta;
}

function linn_get_element_id($set=null,$element=null){
	if(element_exists($set,$element)){
		$elementObj= get_record('Element',array('name'=>$element));
		return $elementObj->id;
	}
}

function linn_elements(){
	$elements = array(
		array(
			'name'=>'Species',
			'description'=>'Taxonomic rank, basic unit of classification of an organism.',
			'order'=>1
			),
		array(
			'name'=>'Genus',
			'description'=>'Taxonomic rank.',
			'order'=>2
			),
		array(
			'name'=>'Family',
			'description'=>'Taxonomic rank',
			'order'=>3
			),
		array(
			'name'=>'Common Name',
			'description'=>'Popular name for a species.',
			'order'=>4
			),
		array(
			'name'=>'Specimen Origin',
			'description'=>'Origin of specimen being used to represent this species.',
			'order'=>5
			),

	);

	return $elements;
}


function linn_item_form_helper_text_array(){
	$it=linn_item_type();
	$it_name=$it['name'];
	$mod = array(
		'tabs'=>
			array( // tabs that need some helper text
				array(
				'text'=>'<p class="linn-helper">Choose <strong>'.$it_name.'</strong> from the select menu to reveal Species element fields.</p>',
				'insert_point'=>'.items #edit-form #item-type-metadata-metadata .set h2',
				),
				array(
				'text'=>'<p class="linn-helper">You can use Dublin Core fields to add basic information, however the Linnaeus theme will give preference to Species Item Type fields on the public side. For ease of use on the admin side, it is recommended you give each specimen a Title. If you would like to utilize additional Dublin Core Fields, use the "Reveal" button below.</p>',
				'insert_point'=>'.items #edit-form #dublin-core-metadata .set h2',
				),
			),
		'item_fields'=>
			array( // key fields to reorder, etc...
				linn_get_element_id('Dublin Core','Title'),
				linn_get_element_id('Dublin Core','Description'),
                linn_get_element_id('Dublin Core','Creator'),
			),
		);

	return json_encode($mod);
}
