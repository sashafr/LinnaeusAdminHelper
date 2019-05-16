<?php
	$it_info=linn_item_type();
	$it_name=$it_info['name'];
?>
<script>

	// Tab text on item and file forms
	var form_mod_array=<?php echo linn_item_form_helper_text_array();?>;
	jQuery.each(form_mod_array.tabs, function(i,data){
		jQuery(data.insert_point).after('<span class="tab-info"><span class="fa fa-question-circle"></span> How-to</span>'+data.text);
	});

	// Use jQueryUI to create theme options accordion
	function getParameterByName(name) {
	    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
	    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
	        results = regex.exec(location.search);
	    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
	}

	jQuery(".theme-configuration [id^='fieldset-']").each(function(i){
		jQuery(this).children('.field').wrapAll('<div />');
	 });
	jQuery('fieldset').accordion({
		header:'legend',
		collapsible: true,
		active: false,
		heightStyleType: 'content',
		});
	jQuery('legend').css('width','92.6%');
	jQuery('.ui-accordion .ui-accordion-content').css('height','auto');

	// Re-order and re-style elements for items and files
	jQuery('.items #dublin-core-metadata .field,.files #dublin-core-metadata .field').addClass('toggle-me').hide();

	jQuery('.items #dublin-core-metadata .element-set-description,.files #dublin-core-metadata .element-set-description').after('<div id="dc-reveal">Looking for <strong>unused</strong> Dublin Core fields?</div>');

    jQuery('#dc-reveal').click(function(){
        jQuery('#dublin-core-metadata .field.toggle-me').slideToggle();
        jQuery(this).html(function(i,text){
	        var default_txt="Looking for <strong>unused</strong> Dublin Core fields?";
	        return text === default_txt ? "Hide <strong>unused</strong> Dublin Core fields" : default_txt;
        });
    });

    // items
	jQuery.each(form_mod_array.item_fields, function(i,id){
		jQuery('.items #edit-form #element-'+id).removeClass('toggle-me').insertBefore('#dc-reveal').show();
	});

    // fields
	jQuery.each(form_mod_array.file_fields, function(i,id){
		jQuery('.files #edit-form #element-'+id).removeClass('toggle-me').insertBefore('#dc-reveal').show();
	});

	// Highlight the Species item type in the dropdown
	jQuery('select#item-type option:contains("<?php echo $it_name;?>")').css("background-color","yellow");

</script>
