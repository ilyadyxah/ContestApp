document.querySelector('.response4').addEventListener('click', myFunction);
document.querySelector('.response5').addEventListener('click', myFunction);

function myFunction (event) {
    let url;
    let url1 = 'konkursy/royal_mail.php';
    let url2 = 'konkursy/royal_word.php';
    let form = document.forms[0];
    switch (event.target.name) {
        case form.elements[7].name:
            url = url1;
            break;
        case form.elements[8].name:
            url = url2;
            break;
    }
    let form_text = form.elements.text.value;
    let form_mesto = form.elements.mesto.value;
    let form_age = form.elements.age.value;
    let form_nominate = form.elements.nominate.value;
    let data = {
        text : form_text,
        mesto : form_mesto,
        age : form_age,
        nominate: form_nominate
    };
    postData(url, data)
        .then((data) => {
            document.querySelector('.response_text').innerHTML = data;
        })
    form.reset();

}
async function postData(url = '', data) {
    const response = await fetch(url, {
        method: 'POST',
        headers: {
            //'Content-Type': 'application/json'
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: JSON.stringify(data)
    });
    return await response.text();
}





