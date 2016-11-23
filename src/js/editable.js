$(function() {
	
	var getButtonAndDataHTML = function(event) {
		var buttonAndDataHTML = '';
		buttonAndDataHTML += '<input type="submit" class="btn btn-primary" value="Save" />';
		buttonAndDataHTML += '<input type="button" name="' + event.data.form.attr('id') + 'rst" class="btn btn-danger" value="Reset">';
		 buttonAndDataHTML += '<input type="hidden" name="id" value=' +$("#actId").text() +' >';

		 return buttonAndDataHTML;
	}

	function submitFunction(event) {
		event.preventDefault(); // make sure it doesn't submit at the inappropriate time

		console.log("submit function called");

		var form = event.data.form;
		var textbox = event.data.textbox;

		var postData = $(this).serialize();
		var formUrl = $(this).attr("action");

		$.ajax(
			{
				url: './controller/saveAct.php',
				type: "POST",
				data: postData,
				success: function(response) {
					form.css('display', 'none');
					textbox.text(response);
					textbox.show();
				},
			}
		);
	}

		var getNameForm = function(event) {
			// Oddly enough, this method causes less problems than $('formElement').attr(...) stuff
			var formHTML = '<textarea rows="4" name="' + event.data.field + 'Text" cols="50"></textarea><br />';
			formHTML += getButtonAndDataHTML(event);

			var form = event.data.form;
			form.html(formHTML);			
		}

		var getIntroOutroForm = function(event) {
			var formHTML = '<textarea rows="10" name="' + event.data.field + 'Text" cols="50"></textarea><br />';
			formHTML += '<input type="hidden" name="field" value='+event.data.field+' >';
			formHTML += getButtonAndDataHTML(event);
			var form = event.data.form;
			form.html(formHTML);

			return form;
		}

		var nameClickHandler = function(event) {
			var form = getNameForm(event);
			var textbox = event.data.textbox;

			form.addClass('custom-form-1');
			form.css('display', 'block');

			$("form :input[name='addPart']").click(function() {
				$("#partDiv").append("<input type='text' style='margin-top:1em;' name='participant[]' /><br />");
			});

			form.submit({form: event.data.form, textbox: event.data.textbox}, submitFunction);

			$('form :input[name="'+form.attr('id')+'rst"]').click(function(){
				form.hide();
				textbox.show();
			});

		} // end nameClickHandler

		var clickHandler = function(event) {
			console.log("Click Handler called");
			var form = getIntroOutroForm(event);
			var textbox = event.data.textbox;

			form.addClass('custom-form-1');
			form.css('display', 'block');

			form.submit({form: event.data.form, textbox: event.data.textbox}, submitFunction);

			$('form :input[name="'+event.data.form.attr('id')+'rst"]').click(function(){
			form.hide();
			textbox.show();
		});
		
		;
	}; // end clickHandler


	$("#edit-intro").click(
			{form: $("#intro-form"), textbox: $("#intro-text"), field: "intro"}, clickHandler);
	
	$("#edit-outro").click(
			{form: $("#outro-form"), textbox: $("#outro-text"), field: "outro"}, clickHandler);

	$("#edit-name").click(
			{form: $("#name-form"), textbox: $("#name-text"), field: "actName"}, nameClickHandler);

});