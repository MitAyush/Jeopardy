function isAvailable(btn) {
	btn = $(btn);

	let username = btn.val();
	$.post('checkUsername', {username: username}, function(data){
		if (data == 'false') {
			btn.siblings("p").removeClass("hideit");
		}
		else{
			btn.siblings("p").addClass("hideit");
		}
	});
}
const closeBtn = $('.close-button');
const correct = $('#total-correct'); 
const incorrect = $('#total-incorrect'); 
const score = $('#total-score'); 
function checkResponse(btn) {
	const btnObj = $(btn);
	const id = btnObj.parent().attr('id');
	const database_id = id.split('-');
	const option = btnObj.serialize().split('=');


	$.post('checkResponse', {database: database_id[0], ques_id : database_id[1], option: option[1]}, function(response){
				// alert(response);
			response = jQuery.parseJSON(response);
			const tdId = $('#' + id + '-td');
			if (response.result ==  true){
				let curr = correct.text() * 1;
				correct.html(curr + 1);

				curr = score.text() * 1;
				score.html(curr + (response['marks'] * 1));

				
				tdId.css('background-color', 'green');
				tdId.html(`<span class="response-span animate__animated animate__heartBeat">${response['marks']}</span>`);
			}
			else{
				let curr = incorrect.text() * 1;
				incorrect.html(curr + 1);

				tdId.css('background-color', '#cc4b37');
				$('#' + id + '-td').html(`<span class="response-span animate__animated animate__wobble">000</span>`);
			}
	});
	closeBtn.click();
	return false;
}


//------abhhishek ki mehnat----------//

