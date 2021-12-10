document.querySelector('.response1').addEventListener('click', myFunction);
document.querySelector('.response2').addEventListener('click', myFunction);
document.querySelector('.response3').addEventListener('click', myFunction);

function myFunction (event) {
    let url;
    let url1 = 'mail_dominanta.php';
    let url2 = 'word.php';
    let url3 = 'other.php';
    let form = document.forms[0];
    switch (event.target.name) {
        case form.elements[2].name:
            url = url1;
            break;
        case form.elements[3].name:
            url = url2;
            break;
        case form.elements[4].name:
            url = url3;
            break;
    }
    console.log(url)
    let form_text = form.elements.text.value;
    let form_mesto = form.elements.mesto.value;
    let data = {
        text : form_text,
        mesto : form_mesto
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





