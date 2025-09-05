let auth_token;
$(document).ready(function () {
  $.ajax({

    type: "get",
    url: "https://www.universal-tutorial.com/api/getaccesstoken",
    success: function (data) {
      auth_token = data.auth_token;
      getCountry(data.auth_token);
    },
    error: function (error) {
      console.log(error);
    },
    headers: {
      "Accept": "application/json",
      "api-token": "3H4soPbzTdy9fH61jpsQmhB3Sw5SZskYPVd3BOUWQXF23NEkS-rLtu0TLMcQ5b6VZms",
      "user-email": "mahajansangmeshwar024@gmail.com"
    }
  });
  $('#country').change(function () {
    getState();
  });
  $('#state').change(function () {
    getCity();
  });
});


function getCountry() {
  $.ajax({

    type: "get",
    url: "https://www.universal-tutorial.com/api/countries/",
    success: function (data) {
      data.forEach(element => {
        $('#country').append('<option value="' + element.country_name + '">' + element.country_name + '</option>');
      });
      getState(auth_token);
    },
    error: function (error) {
      console.log(error);
    },
    headers: {
      "Authorization": "Bearer " + auth_token,
      "Accept": "application/json"
    }
  });

}

function getState() {
  var country_name = $('#country').val();
  //var country_name = 'India';
  $.ajax({

    type: "get",
    url: "https://www.universal-tutorial.com/api/states/" + country_name,
    success: function (data) {
      //getCity(auth_token);
      $('#state').empty();
      data.forEach(element => {
        $('#state').append('<option value="' + element.state_name + '">' + element.state_name + '</option>');
      });
    },
    error: function (error) {
      console.log(error);
    },
    headers: {
      "Authorization": "Bearer " + auth_token,
      "Accept": "application/json"
    }
  });
}

function getCity() {
  var state_name = $('#state').val();
  //var state_name = 'Goa';
  $.ajax({

    type: "get",
    url: "https://www.universal-tutorial.com/api/cities/" + state_name,
    success: function (data) {
      //console.log('ajax');
      $('#city').empty();
      data.forEach(element => {
        $('#city').append('<option value="' + element.city_name + '">' + element.city_name + '</option>');
      });
    },
    error: function (error) {
      console.log(error);
    },
    headers: {
      "Authorization": "Bearer " + auth_token,
      "Accept": "application/json"
    }
  });
}