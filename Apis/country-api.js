export{ getDataAll, postData, putData, deleteData, searchDataById }

const opc = {
    "GET": () => getDataAll(),
    "PUT": (data,id) => putData(data,id),
    "DELETE": (id) => deleteData(id),
    "POST": (data) => postData(data)
}

//Escribimos el encabezado para hacer las peticiones de fecth 
let config = {
    headers:new Headers({
        "Content-Type": "application/json; charset:utf8"
    }), 
};

//funcion para el POST
const postData = async(data)=>{
    config.method = "POST";
    config.body = JSON.stringify(data);
    let res = await ( await fetch("../controllers/Country/insert_data.php" ,config)).text();
    console.log(res);
    return res;
}

//funcion PUT
const putData = async(data,id)=>{
    config.method = "PUT";
    config.body = JSON.stringify(data);
    let res = await ( await fetch(`../controllers/Country/insert_data.php/${id}` ,config)).json();
    console.log(res);
    return res;
}

//funcion DELETE
const deleteData = async(id)=>{
    config.method = "DELETE";
    let res = await ( await fetch(`../controllers/Country/insert_data.php/${id}` ,config)).json();
    console.log(res);
}

//funcion GET
const getDataAll = async()=>{
    config.method = "GET";
    let res = await ( await fetch("../controllers/Country/insert_data.php",config)).json();
    return res;
}

//funcion para BUSCAR por GET
const searchDataById = async(id)=>{
    config.method = "GET";
    let res = await ( await fetch(`../controllers/Country/insert_data.php/${id}` ,config)).json();
    console.log(id);
    return res;
}
