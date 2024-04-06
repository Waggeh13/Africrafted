const form = {
    username: document.getElementById('username'),
    password: document.getElementById('password'),
    submit: document.getElementById('btn-submit'),
    messages: document.getElementById('form-messages'),
};

form.submit.addEventListener('click', () => {
    const request = new XMLHttpRequest();
    request.onload = () => {
       let responseObject = null;

       try{
        responseObject = JSON.parse(request.responseText);
       } catch (e) {
        console.error('could not parse JSON');
       }

       if(responseObject){
        handleResponse(responseObject);
       }
    };

    const requestData = `username=${encodeURIComponent(form.username.value)}&password=${encodeURIComponent(form.password.value)}`;


    request.open('post', 'check_login_action.php');
    request.setRequestHeader('content-type', 'application/x-www-login_form-urlencoded');
    request.send(requestData);
});

function handleResponse (responseObject){
    debugger;
    console.log(responseObject);
}