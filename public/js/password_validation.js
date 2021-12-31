var check = function() {
    if (document.getElementById('password').value ==
      document.getElementById('confirm_password').value) {
      document.getElementById('message').style.color = 'green';
      // document.getElementById('message').innerHTML = 'password match';
      document.getElementById('message').innerHTML = '';
      document.getElementById('submit').disabled = false;
    } else {
      document.getElementById('message').style.color = 'red';
      document.getElementById('message').innerHTML = 'password tidak cocok';
      document.getElementById('submit').disabled = true;
    }
  }