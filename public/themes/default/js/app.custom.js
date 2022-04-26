window.addEventListener("load", function() {
	window.cookieconsent.initialise({
		"palette": {
			"popup": {
				"background": "#000"
			},
			"button": {
				"background": "#f1d600",
				"text": ""
			}
		},
		"type": "opt-out",
		"content": {
			"message": "This website uses cookies to ensure you get the best experiance on our website",
			"dismiss": "Got it!",
			"link": "learn more",
			"href": "https://cookieconsent.insites.com"
		}
	})
});
$('#button-show-signup').click(function() {
	$('#signup-space').css('visibility', 'visible');
	$('#button-space').css('visibility', 'hidden');
});
$('#button-show-signup-1').click(function() {
	$('#signup-space').css('visibility', 'visible');
	$('#button-space').css('visibility', 'hidden');
});
//<!--NOTIFICATION JS-->
$(function() {
	$.miniNotification = function(e, t) {
		var n, r, i, s, o, u, a = this;
		this.defaults = {
			position: "top",
			show: true,
			effect: "slide",
			opacity: .95,
			time: 4e3,
			showSpeed: 600,
			hideSpeed: 450,
			showEasing: "",
			hideEasing: "",
			innerDivClass: "inner",
			closeButton: false,
			closeButtonText: "close",
			closeButtonClass: "close",
			hideOnClick: true,
			onLoad: function() {},
			onVisible: function() {},
			onHide: function() {},
			onHidden: function() {}
		};
		o = "";
		this.settings = {};
		this.$element = $(e);
		s = function(e) {
			return o = e
		};
		r = function() {
			var e, t;
			t = a.getSetting("effect") === "slide" ? 0 - a.$element.outerHeight() : 0;
			e = {};
			if (a.getSetting("position") === "bottom") {
				e["bottom"] = t
			} else {
				e["top"] = t
			}
			if (a.getSetting("effect") === "fade") {
				e["opacity"] = 0
			}
			return e
		};
		i = function() {
			var e;
			e = {
				opacity: a.getSetting("opacity")
			};
			if (a.getSetting("position") === "bottom") {
				e["bottom"] = 0
			} else {
				e["top"] = 0
			}
			return e
		};
		u = function() {
			a.$elementInner = $("<div />", {
				"class": a.getSetting("innerDivClass")
			});
			return a.$element.wrapInner(a.$elementInner)
		};
		n = function() {
			var e;
			e = $("<a />", {
				"class": a.getSetting("closeButtonClass"),
				html: a.getSetting("closeButtonText")
			});
			a.$element.children().append(e);
			return e.bind("click", function() {
				return a.hide()
			})
		};
		this.getState = function() {
			return o
		};
		this.getSetting = function(e) {
			return this.settings[e]
		};
		this.callSettingFunction = function(t) {
			return this.settings[t](e)
		};
		this.init = function() {
			var e = this;
			s("hidden");
			this.settings = $.extend({}, this.defaults, t);
			if (this.$element.length) {
				u();
				if (this.getSetting("closeButton")) {
					n()
				}
				this.$element.css(r()).css({
					display: "inline"
				});
				if (this.getSetting("show")) {
					this.show()
				}
				if (this.getSetting("hideOnClick")) {
					return this.$element.bind("click", function() {
						if (e.getState() !== "hiding") {
							return e.hide()
						}
					})
				}
			}
		};
		this.show = function() {
			var e = this;
			if (this.getState() !== "showing" && this.getState() !== "visible") {
				s("showing");
				this.callSettingFunction("onLoad");
				return this.$element.animate(i(), this.getSetting("showSpeed"), this.getSetting("showEasing"), function() {
					s("visible");
					e.callSettingFunction("onVisible");
					return setTimeout(function() {
						return e.hide()
					}, e.settings.time)
				})
			}
		};
		this.hide = function() {
			var e = this;
			if (this.getState() !== "hiding" && this.getState() !== "hidden") {
				s("hiding");
				this.callSettingFunction("onHide");
				return this.$element.animate(r(), this.getSetting("hideSpeed"), this.getSetting("hideEasing"), function() {
					s("hidden");
					return e.callSettingFunction("onHidden")
				})
			}
		};
		this.init();
		return this
	};
	return $.fn.miniNotification = function(e) {
		return this.each(function() {
			var t;
			t = $(this).data("miniNotification");
			if (t === void 0) {
				t = new $.miniNotification(this, e);
				return $(this).data("miniNotification", t)
			} else {
				return t.show()
			}
		})
	}
})
// CALL NOTIFICATION
$(function() {
	$('.heze-notify').miniNotification({
		closeButton: true,
		closeButtonText: '<i class="fa fa-times"></i>'
	});
}); /*HTML DATA TABLE*/
$(function() {
	$('table').footable();
}); /*TOOL TIP*/
$(document).ready(function() {
	$(".tip").tooltip();
}); /*SCROLLER*/
$(function() {
	$('.divscroll').slimscroll({
		height: '98%'
	});
});
//Date picker
$(function() {
	window.prettyPrint && prettyPrint();
	$('.datepicker').datepicker({
		format: 'yyyy-mm-dd'
	});
});
//MODAL BOX
$(document).ready(function() {
	$('a[data-confirm]').click(function(ev) {
		var href = $(this).attr('href');
		if (!$('#dataConfirmModal').length) {
			$('body').append('<div id="dataConfirmModal" class="modal fade" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h3 id="dataConfirmLabel">Please Confirm</h3></div><div class="modal-body"></div><div class="modal-footer"><button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancel</button><a class="btn btn-primary" id="dataConfirmOK">Yes</a></div></div></div></div>');
		}
		$('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
		$('#dataConfirmOK').attr('href', href);
		$('#dataConfirmModal').modal({
			show: true
		});
		return false;
	});
});
//MULTI FIELDS
var startingNo = -1;
var $node = "";
for (varCount = 0; varCount <= startingNo; varCount++) {
	var displayCount = varCount + 1;
	$node += '<span><input type="file" name="gfile[]" id="gfile[]" class="styler" style="padding:0px;"><span class="removeVar btn btn-xs btn-danger">Remove</span></span>';
}
$('form').prepend($node);
$('form').on('click', '.removeVar', function() {
	$(this).parent().remove();
	//varCount--; to show numbers '+varCount+'
});

$('#addVar').on('click', function() {
	varCount++;
	$node = '<span> <input type="file" name="gfile[]" id="gfile[]" class="styler" style="padding:0px; width:220px; margin-top:-10px;"><span class="removeVar btn btn-xs btn-danger " style="margin-left:220px; margin-top:-50px;">Remove</span></span>';
	$(this).parent().before($node);
});
//LIGHTBOX	
$(function() {
	$(".gallery a[data-rel^='hezebox']").lightbox();
}); /*Form ajax*/
$(document).ready(function() {
	$('#hezecomform').on('submit', function(e) {
		e.preventDefault();
		$('#msgButton').attr('disabled', '');
		$(".output").html('<div><i class="fa fa-spinner fa-spin fa-2x"></i> Processing...</div>');
		$(this).ajaxSubmit({
			target: '.output',
			success: afterSuccess
		});
	});
});
$(document).ready(function() {
	$('#singnupFrom').on('submit', function(e) {
		e.preventDefault();
		$('#msgButton').attr('disabled', '');
		$(".output-error").html('<div><i class="fa fa-spinner fa-spin fa-2x"></i> Processing...</div>');
		$(this).ajaxSubmit({
			target: '.output-error',
			success: afterSuccess
		});
	});
});

function afterSuccess() {
	$('#msgButton').removeAttr('disabled'); //enable submit button
}
//EDITORS
//html5 
$(function() {
	$(".editor2").wysihtml5();
});
//TynyMCE	  
tinymce.init({
	selector: "textarea.editor1",
	theme: "modern",
	width: "auto",
	height: 200,
	plugins: ["advlist autolink link image lists charmap  preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "save table contextmenu directionality   paste textcolor jbimages"],
	toolbar: "styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink  jbimages | print preview ",
	relative_urls: false
});
//Chosen
$(".choz").chosen({
	disable_search: false,
	no_results_text: "No Search Results!",
	width: "100%",
});

function ListAvailableState(state) {
	var data = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	var params = 'do=AccessLoadStates&key=' + state.options[state.selectedIndex].value;
	// Type of request: Post and the URL of the API
	data.open("POST", 'libraries/process.php', true);
	// Create an event to receive the return.
	data.onreadystatechange = function() {
		// If the state is 4 and the http.status is 200, it's because the request worked out.
		if (data.readyState == XMLHttpRequest.DONE && data.status == 200) {
			document.getElementById('list_state').innerHTML = data.responseText;
			$('#list_state').trigger("chosen:updated");
			var results = data.responseText;
			// Return of Ajax
			
		}
	}
	data.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
	data.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// Parameters of the request and send the requisition
	data.send(params);
}

function ListAvailableCites(city) {
	var countrycode = city.options[city.selectedIndex].getAttribute('data-country');
	var data = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	var params = 'do=AccessLoadCities&key=' + city.options[city.selectedIndex].value + '&cid=' + countrycode;
	// Type of request: Post and the URL of the API
	data.open("POST", 'libraries/process.php', true);
	// Create an event to receive the return.
	data.onreadystatechange = function() {
		// If the state is 4 and the http.status is 200, it's because the request worked out.
		if (data.readyState == XMLHttpRequest.DONE && data.status == 200) {
			document.getElementById('list_city').innerHTML = data.responseText;
			$('#list_city').trigger("chosen:updated");
			var results = data.responseText;
			// Return of Ajax
			//console.log(results);
		}
	}
	data.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
	data.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// Parameters of the request and send the requisition
	data.send(params);
}
function ListAvailableCitesChecklist(city) {
	var countryCode = city.options[city.selectedIndex].getAttribute('data-country');
    var stateCode = city.options[city.selectedIndex].getAttribute('data-state');
	var data = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	var params = 'do=AccessLoadCheckedZones&key=' + stateCode + '&cid=' + countryCode;
	// Type of request: Post and the URL of the API
	data.open("POST", 'libraries/process.php', true);
	// Create an event to receive the return.
	data.onreadystatechange = function() {
		// If the state is 4 and the http.status is 200, it's because the request worked out.
		if (data.readyState == XMLHttpRequest.DONE && data.status == 200) {
			document.getElementById('zone_coverage').innerHTML = data.responseText;
			$('#zone_coverage').trigger("chosen:updated");
			var results = data.responseText;
			// Return of Ajax
			//console.log(results);
		}
	}
	data.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
	data.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// Parameters of the request and send the requisition
	data.send(params);
}
function ListAvailableBranches(state) {
	var data = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	var params = 'do=AccessLoadBranches&key=' + state.options[state.selectedIndex].value;
	// Type of request: Post and the URL of the API
	data.open("POST", 'libraries/process.php', true);
	// Create an event to receive the return.
	data.onreadystatechange = function() {
		// If the state is 4 and the http.status is 200, it's because the request worked out.
		if (data.readyState == XMLHttpRequest.DONE && data.status == 200) {
			document.getElementById('branch_id').innerHTML = data.responseText;
			$('#branch_id').trigger("chosen:updated");
			var results = data.responseText;
			// Return of Ajax
			//console.log(results);
		}
	}
	data.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
	data.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// Parameters of the request and send the requisition
	data.send(params);
}

function SetCreditRecurrentCharge(assets) {
	var LoanCategory = assets.options[assets.selectedIndex].value;
	var recurrentCharge = assets.options[assets.selectedIndex].getAttribute('loancharge');
	var LoanMinAmount = assets.options[assets.selectedIndex].getAttribute('loanminamount');
	var LoanTenure = assets.options[assets.selectedIndex].getAttribute('loantenure');
	var LoanInterest = assets.options[assets.selectedIndex].getAttribute('loaninterest');
	document.getElementById('credit_request_charge').value = Math.floor(recurrentCharge).toFixed(2);
	document.getElementById('loan_tenure').value = parseInt(LoanTenure, 10);
	document.getElementById('loan_interest').value = parseFloat(LoanInterest);
	// var changeIt = document.getElementById('activator')
	// changeIt.style.visibility = 'hidden';
	// var hideActivatorButton = document.getElementById('activate-request');
	// hideActivatorButton.style.visibility = 'visible';
}

function SetInvestmentRecurrentCharge(assets) {
	var AssetCat = assets.options[assets.selectedIndex].value;
	var recurrentCharge = assets.options[assets.selectedIndex].getAttribute('charges');
	var AssetGroup = assets.options[assets.selectedIndex].getAttribute('groupid');
	var LoanTenure = assets.options[assets.selectedIndex].getAttribute('loantenure');
	var LoanInterest = assets.options[assets.selectedIndex].getAttribute('loaninterest');
	document.getElementById('credit_request_charge').value = Math.floor(recurrentCharge).toFixed(2);
	document.getElementById('investment_tenure').value = parseInt(LoanTenure, 10);
	document.getElementById('investment_interest').value = parseFloat(LoanInterest);
	var changeIt = document.getElementById('activator')
	changeIt.style.visibility = 'hidden';
	var hideActivatorButton = document.getElementById('activate-request');
	hideActivatorButton.style.visibility = 'visible';
}

function SetStudentCreditInfo(assets) {
	var AssetCat = assets.options[assets.selectedIndex].value;
	var newFristName = assets.options[assets.selectedIndex].getAttribute('fristname');
	var newLastName = assets.options[assets.selectedIndex].getAttribute('lastname');
	var newMobile = assets.options[assets.selectedIndex].getAttribute('mobile');
	var newEmail = assets.options[assets.selectedIndex].getAttribute('email');
	document.getElementById('beneficary_fn').value = newFristName;
	document.getElementById('beneficary_ln').value = newLastName;
	document.getElementById('beneficary_mobile').value = newMobile;
	document.getElementById('beneficary_email').value = newEmail;
}

function SetBusinessPlanAmount(assets) {
	var AssetCat = assets.options[assets.selectedIndex].value;
	var amount = assets.options[assets.selectedIndex].getAttribute('amount');
	var monthly_revenue = assets.options[assets.selectedIndex].getAttribute('monthly_revenue');


	document.getElementById('monthly_revenue').value = monthly_revenue;

	//
}

function SetSchoolAnnualFees(assets) {
	var AssetCat = assets.options[assets.selectedIndex].value;
	var annualSchoolFees = assets.options[assets.selectedIndex].getAttribute('data');
	document.getElementById('credit_request_annual_school_fees').value = Math.floor(annualSchoolFees).toFixed(2);
}

$("#loan_request_amount").blur(function() {
	// var bid = $('#receiver_bank_id').find(":selected").text();
	var amount_request = $('#loan_request_amount').val();
	if(amount_request === ''){
		return;
	}
	var amount = document.getElementById('loan_request_amount').value;
	var loan_request_deposit = Number(amount * 0.10).toFixed(2);
	document.getElementById('loan_request_deposit').value = loan_request_deposit;
	calculateLoan();
});


$("#amount_approved").blur(function() {
	// var bid = $('#receiver_bank_id').find(":selected").text();
	var amount_request = $('#amount_approved').val();
	if(amount_request === ''){
		return;
	}
	var amount = document.getElementById('amount_approved').value;
	var loan_request_deposit = Number(amount * 0.10).toFixed(2);
	document.getElementById('loan_request_deposit').value = loan_request_deposit;
	calculateApprovedLoan();
});

function calculateApprovedLoan() {
	var loanRequestAmount = document.getElementById('amount_approved').value;
	var interest_rate = document.getElementById('loan_interest').value;
	var loanTenure = document.getElementById('loan_tenure').value;
	var interest = (loanRequestAmount * (interest_rate/100));
	var monthlyPayment = Number((loanRequestAmount / loanTenure) + interest).toFixed(2);


	// monthlyPayment = Number(monthlyPayment).toFixed(2);
	document.getElementById('monthly_repayment').value = monthlyPayment;
	document.getElementById('total_interest').value = Number(interest * loanTenure).toFixed(2);
	document.getElementById('total_repayment').value = Number(monthlyPayment * loanTenure).toFixed(2);
}

function calculateLoan() {
	var loanRequestAmount = document.getElementById('loan_request_amount').value;
	var interest_rate = document.getElementById('loan_interest').value;
	var loanTenure = document.getElementById('loan_tenure').value;
	var interest = (loanRequestAmount * (interest_rate/100));
	var monthlyPayment = Number((loanRequestAmount / loanTenure) + interest).toFixed(2);


	// monthlyPayment = Number(monthlyPayment).toFixed(2);
	document.getElementById('loan_repayment_amount').value = monthlyPayment;
	document.getElementById('monthlyRepayment').innerHTML = 'Payment Every Month is &#8358; ' + monthlyPayment;
	document.getElementById('totalRepayment').innerHTML = 'Total of ' + loanTenure + ' Payments is &#8358; ' + Number(monthlyPayment * loanTenure).toFixed(2);
}

function calculateInvestment() {
	var LoanTenure = document.getElementById('investment_tenure').value;
	var LoanRequestAmount = document.getElementById('investment_amount').value;
	var LoanInterest = document.getElementById('investment_interest').value;
    var compoundingTimesPerYear = 1;
	var loanAmount = Number(parseFloat(LoanRequestAmount.trim())),
		interest = Number(parseFloat(LoanInterest.trim())),
		numOfMonths = Number(parseInt(LoanTenure.trim()));
	// Use toFixed method to round rate. The toFixed method converts a number to a string,
	// so we use Number() to convert it back.
    const totalCalculatedInterest = (loanAmount * Math.pow((1 + (interest/(compoundingTimesPerYear * 100))), (compoundingTimesPerYear * numOfMonths)));
   	const monthlyPayment = (loanAmount * (interest / 100));
 	document.getElementById('investment_repayment_amount').value = monthlyPayment.toFixed(2);
	document.getElementById('monthlyRepayment').innerHTML = 'Total Interest on '+ LoanRequestAmount +' is &#8358; ' + (totalCalculatedInterest.toFixed(2) - loanAmount).toFixed(2);
	document.getElementById('totalRepayment').innerHTML = 'Total Investment payout for ' + numOfMonths + ' months is &#8358; ' + totalCalculatedInterest.toFixed(2);
}

function cleartext() {
	document.getElementById('name').value = '';
	document.getElementById('email').value = '';
	document.getElementById('phone').value = '';
	document.getElementById('message').value = '';
} /* Loan calculate 2**/
/* Loan calculate 2**/
if(document.getElementById('loan-results') !== null || document.getElementById('loan-results') ===undefined)
{
	document.getElementById('loan-results').style.display = 'none';
	document.getElementById('loan-form').addEventListener('submit', function(e){
		document.getElementById('loan-results').style.display = 'none'
		document.getElementById('loading').style.display = 'block'
		setTimeout(calculateResults, 2000);
		e.preventDefault();
	})
}

function calculateResults() {
	console.log('Calculating');
	const principalAmount = document.getElementById('ammount').value;
	const paidInterest = document.getElementById('interest').value;
	const numberOfmonths = document.getElementById('years').value;
    const compoundingTimesPerYear = 1;
    
	const monlthlyPayment = document.getElementById('monthly-payment');
	const totalPayment = document.getElementById('total-payment');
	const totalInterest = document.getElementById('total-interest');
    

      // The equation is A = p * [[1 + (r/n)] ^ nt]
    const totalCalculatedInterest = (principalAmount * Math.pow((1 + (paidInterest/(compoundingTimesPerYear * 100))), (compoundingTimesPerYear * numberOfmonths)));
   	const monthly = (principalAmount * (paidInterest / 100));
    
	if (isFinite(monthly)) {
		monlthlyPayment.value = monthly.toFixed(2)
		totalPayment.value =  totalCalculatedInterest.toFixed(2);
		totalInterest.value =  (totalCalculatedInterest.toFixed(2) - principalAmount).toFixed(2);
		document.getElementById('loan-results').style.display = 'block'
		document.getElementById('loading').style.display = 'none'
	} else {
		showError('Check your numbers')
	}
}

function showError(error) {
	document.getElementById('results').style.display = 'none'
	document.getElementById('loading').style.display = 'none'
	const errorDiv = document.createElement('div');
	const card = document.querySelector('.card')
	const heading = document.querySelector('.heading')
	errorDiv.className = 'alert alert-danger';
	errorDiv.appendChild(document.createTextNode(error))
	card.insertBefore(errorDiv, heading)
	setTimeout(ClearError, 3000);
}

function ClearError() {
	document.querySelector('.alert').remove()
}
//https://stackoverflow.com/questions/5004233/jquery-ajax-post-example-with-php
// Variable to hold request
var request;
$("#receiver_account_number").blur(function() {
	// var bid = $('#receiver_bank_id').find(":selected").text();
	var acct = $('#receiver_account_number').val();
	var params = 'do=AccessFundingAccount&acct' + acct;
	// Prevent default posting of form - put here to work in case of errors
	event.preventDefault();
	// Abort any pending request
	if (request) {
		request.abort();
	}
	//var form = $('#receiver_bank_id').closest('form').attr('id');//$('hezecomform');
	//console.log('form', form);
	// Let's select and cache all the fields
	//var inputs = form.find("input, select, button, textarea");
	//inputs.prop("disabled", true);
	var allInputs = $(":input");
	var formChildren = $("form > *");
	formChildren.prop("disabled", true);
	request = $.ajax({
		type: 'POST',
		url: 'libraries/process.php',
		data: {
			do: 'AccessFundingAccount',
			key:'check',
			acct: $('#receiver_account_number').val()
		}
	});
	// Callback handler that will be called on success
	request.done(function(results, textStatus, jqXHR) {
		// Log a message to the console
		$('#accountModal').on('show.bs.modal', function(event) {
			var response = JSON.parse(results)
			//console.log("Hooray, it worked!" , JSON.parse(response));
			// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
			// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
			var modal = $(this);
			modal.find('.modal-title').text(response.message);
			modal.find('.modal-body h2').text(response.first_name + ' '+ response.middle_name +' '+response.last_name);
			modal.find('.modal-body h3').text(response.account_number);
			$('#receiver_id').val(response.id)
		})
		$('#accountModal').modal('show');
	});
	// Callback handler that will be called on failure
	request.fail(function(jqXHR, textStatus, errorThrown) {
		// Log the error to the console
		console.error("The following error occurred: " + textStatus, errorThrown);
	});
	// Callback handler that will be called regardless
	// if the request failed or succeeded
	request.always(function() {
		// Re-enable the inputs
		formChildren.prop("disabled", false);
	});
});

$('#cancelPayment').on('click', function () {
	// business logic...
	$('#receiver_account_number').val('')
	$('#receiver_id').val('')
	$('#acct_number').focus();
})


$("#coupon_payment_token").blur(function() {
	// var bid = $('#receiver_bank_id').find(":selected").text();
	var acct = $('#coupon_payment_token').val();
	var params = 'do=AccessFundingAccount&acct' + acct;
	// Prevent default posting of form - put here to work in case of errors
	event.preventDefault();
	// Abort any pending request
	if (request) {
		request.abort();
	}
	//var form = $('#receiver_bank_id').closest('form').attr('id');//$('hezecomform');
	//console.log('form', form);
	// Let's select and cache all the fields
	//var inputs = form.find("input, select, button, textarea");
	//inputs.prop("disabled", true);
	var allInputs = $(":input");
	var formChildren = $("form > *");
	formChildren.prop("disabled", true);
	request = $.ajax({
		type: 'POST',
		url: 'libraries/process.php',
		data: {
			do: 'VerifyPaymentToken',
			key:'check',
			coupon_code: $('#coupon_payment_token').val()
		}
	});
	// Callback handler that will be called on success
	request.done(function(results, textStatus, jqXHR) {
		// Log a message to the console
		// console.log('coupon', JSON.parse(results))
		$('#couponModal').on('show.bs.modal', function(event) {
			var response = JSON.parse(results)
			//console.log("Hooray, it worked!" , JSON.parse(response));
			// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
			// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
			var modal = $(this);
			modal.find('.modal-title').text(response.message);
			modal.find('.modal-body h2').text(response.coupon_desc);
			modal.find('.modal-body h3').text(response.coupon_amount);
			$('#coupon_token_amount').val(response.coupon_amount)
			$('#coupon_token_id').val(response.coupon_user)
			$('#coupon_token_account').val(response.coupon_account)

		})
		$('#couponModal').modal('show');
	});
	// Callback handler that will be called on failure
	request.fail(function(jqXHR, textStatus, errorThrown) {
		// Log the error to the console
		console.error("The following error occurred: " + textStatus, errorThrown);
	});
	// Callback handler that will be called regardless
	// if the request failed or succeeded
	request.always(function() {
		// Re-enable the inputs
		formChildren.prop("disabled", false);
	});
});

$('#cancelCoupon').on('click', function () {
	// business logic...
	$('#coupon_payment_token').val('')
	$('#coupon_token_amount').val('')
	$('#coupon_token_id').val('')
	$('#coupon_token_account').val('')
	$('#acct_number').focus();
})

function savePaymentInfo(params) {
	// console.log('params',params);
    // Prevent default posting of form - put here to work in case of errors
	event.preventDefault();
	// Abort any pending request
	if (request) {
		request.abort();
	}
	var allInputs = $(":input");
	var formChildren = $("form > *");
	formChildren.prop("disabled", true);
	request = $.ajax({
		type: 'POST',
		url: 'libraries/process.php',
		data: {
			do: 'AssetPayBizPlan',
			key: JSON.stringify(params)
		}
	});
	// Callback handler that will be called on success
	request.done(function(results, textStatus, jqXHR) {
		// Log a message to the console
		// console.log('payment', JSON.parse(results));
		$('#bizPlanModal').on('show.bs.modal', function(event) {
			var response = JSON.parse(results)
            console.log(response);
			//console.log("Hooray, it worked!" , JSON.parse(response));
			// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
			// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
			var modal = $(this);
			modal.find('.modal-title').text(response.title);
			modal.find('.modal-body span').text(response.message);			
		})
		$('#bizPlanModal').modal('show');
	});
	// Callback handler that will be called on failure
	request.fail(function(jqXHR, textStatus, errorThrown) {
		// Log the error to the console
		console.error("The following error occurred: " + textStatus, errorThrown);
	});
	// Callback handler that will be called regardless
	// if the request failed or succeeded
	request.always(function() {
		// Re-enable the inputs
		formChildren.prop("disabled", false);
	});
}