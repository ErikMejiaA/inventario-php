export { postData };

// seleccionamos el formulario de paises
let formCountries = document.querySelector('#formCountries'); 
// definimos el  encabezado para el envio de datos
let myHeaderCountry = new Headers({"Content-Type": "application/json; charset:utf8"});
//definimos un evento para cuando se cargue toda la pagina
document.addEventListener('DOMContentLoaded', (e) => {


});

//creamos el evento al boton para enviar los datos 
document.querySelector('#btnCountries').addEventListener('click', async (e) => {
    
    e.preventDefault();
    // obtenemos los datos del formulario
    let data = Object.fromEntries(new FormData(formCountries).entries()); 
    postData(data).then(resp => {
        //document.querySelector("pre").innerHTML = r;
    });

    alert("Los datos fueron enviados Corectamente");
});

//funcion para el POST
const postData = async(data)=>{
    let config = {
        method : "POST",
        headers : myHeaderCountry,
        body : JSON.stringify(data)
    }
    let res = await ( await fetch("controllers/Country/insert_data.php" ,config)).text();
    return res;
}

const borrarData = async (id) => {
    let config = {
        method: "DELETE",
    };
    let res = await (await fetch(`controllers/Country/delete_data.php?${id}`, config)).text();
    return res;
}
const loadAllData = async () => {
    let res = await (await fetch("controllers/Country/select_data.php")).json();
    return res;
}


