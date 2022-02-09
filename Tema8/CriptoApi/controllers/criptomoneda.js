const { restart } = require("nodemon");
const Cripto = require("../models/criptomoneda");


//OBTENER TODAS LAS CRIPTOMONEDAS
async function getCriptos(req,res) {
    try {
        const criptos = await Cripto.find().limit(50);

        if (!criptos) {
            res.status(400).send({ msg: "Error al obtener las Criptomoneda"});
        } else {
            res.status(200).send(criptos);
        }
    } catch (error) {
        res.status(500).send(error);
    }
}
//ACTUALIZA LOS DATOS DE UNA CRIPTOMONEDA BUSCANDOLA POR ID
async function updateCripto(req, res){
    const idCripto = req.params.id;
    const params = req.body;

    try {
        const cripto = await Cripto.findByIdAndUpdate(idCripto,params);

        if (!cripto) {
            res.status(400).send({msg: "No se ha podido actualizar la Criptomoneda"});
        } else {
            res.status(200).send({msg: "Actualizacion completada"});
        }
    } catch (error) {
        res.status(500).send(error)
    }
}
//CREAR UNA NULEVA CRIPTOMONEDA
async function createCripto(req, res) {
    const cripto = new Cripto();
    const params = req.body;
    const {nombre} = req.body;

    cripto.nombre = params.nombre;
    cripto.simbolo = params.simbolo;
    cripto.descripcion = params.descripcion;
    cripto.precio = params.precio;
    cripto.variacion = params.variacion;
    cripto.capitalizacion = params.capitalizacion;

    const foundCripto = await Cripto.findOne({ nombre });
   
    try {
        if (foundCripto) throw { msg: "Esa Criptomoneda ya se encuentra en la base de datos"};
        const criptoStore = await cripto.save();

        if (!criptoStore) {
            res.status(400).send({msg: "No se ha guardado la Criptomoneda"});
        } else {
            res.status(200).send({cripto: criptoStore });
        }

    } catch (error) {
        res.status(500).send(error);
    }
}

//OBTENER UNA SOLA CRIPTOMONEDA POR ID
async function getCripto(req, res){
    const idCripto = req.params.id;
    try {
        const cripto = await Cripto.findById(idCripto);

        if (!cripto) {
            res.status(400).send({msg : "No se ha encontrado la tarea Criptomoneda"})
        } else {
            res.status(200).send(cripto);
        }
    } catch (error) {
        res.status(500).send(error)
    }
}



//BORRA UNA CRIPTOMONEDA BUSCANDOLA POR ID
async function deleteCripto(req, res){
    const idCripto = req.params.id;

    try {
        const cripto = await Cripto.findByIdAndDelete(idCripto);
        if (!cripto) {
            res.status(400).send({msg: "No se ha podido eliminar la Criptomoneda"})
        } else {
            res.status(200).send({msg: "Criptomoneda eliminada correctamente"})
        }
    } catch (error) {
        res.status(500).send(error)
    }
}

async function subirCripto(req, res){
    const idCripto = req.params.id;
    
    try {
        const cripto = await Cripto.findByIdAndUpdate(idCripto, {$inc: { precio: 0.1 }});
        if (!cripto) {
            res.status(400).send({msg: "No se ha podido incrementar el precio de la Criptomoneda"});
        } else {
            res.status(200).send({msg: "Precio de la Criptomoneda actualizado correctamente"});
        }
    } catch (error) {
        res.status(500).send(error);
        console.log(error)
    }
 }
 async function bajarCripto(req, res){
    const idCripto = req.params.id;
    
    try {
        const cripto = await Cripto.findByIdAndUpdate(idCripto, {$inc: { precio: -0.1 }});
        if (!cripto) {
            res.status(400).send({msg: "No se ha podido devaluar el precio de la Criptomoneda"});
        } else {
            res.status(200).send({msg: "Precio de la Criptomoneda actualizado correctamente"});
        }
    } catch (error) {
        res.status(500).send(error);
    }
 }

 
//OBTENER TODAS LAS CRIPTOMONEDAS
async function getCriptosPrecio(req,res) {
    try {
        const criptos = await Cripto.find().sort({precio: -1}).limit(10);
       
        if (!criptos) {
            res.status(400).send({ msg: "Error al obtener las Criptomoneda"});
        } else {
            res.status(200).send(criptos);
        }
    } catch (error) {
        res.status(500).send(error); 
    }
}
module.exports = {
    createCripto,
    getCriptos,
    getCripto,
    updateCripto,
    deleteCripto,
    subirCripto,
    bajarCripto,
    getCriptosPrecio,
};