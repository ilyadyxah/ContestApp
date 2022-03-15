document.querySelector('.response4').addEventListener('click', myFunction);
document.querySelector('.response5').addEventListener('click', myFunction);

function myFunction (event) {
    let url;
    let url1 = 'Contests/mailRoyal.php';
    let url2 = 'Contests/wordRoyal.php';
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
    let form_place = form.elements.place.value;
    let form_age = form.elements.age.value;
    let form_nominate = form.elements.nominate.value;
    let data = {
        text : form_text,
        place : form_place,
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





