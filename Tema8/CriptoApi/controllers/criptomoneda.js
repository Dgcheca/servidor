const { restart } = require("nodemon");
const Cripto = require("../models/criptomoneda");

async function createCripto(req, res) {
    const cripto = new Cripto();
    const params = req.body;

    cripto.nombre = params.nombre;
    cripto.simbolo = params.simbolo;
    cripto.descripcion = params.descripcion;
    cripto.precio = params.precio;
    cripto.variacion = params.variacion;
    cripto.capitalizacion = params.capitalizacion;

    try {
        const criptoStore = await cripto.save();

        if (!criptoStore) {
            res.status(400).send({msg: "No se ha guardado la tarea"});
        } else {
            res.status(200).send({cripto: criptoStore });
        }

    } catch (error) {
        res.status(500).send(error);
    }
}

async function getCriptos(req,res) {
    try {
        const criptos = await Cripto.find();

        if (!criptos) {
            res.status(400).send({ msg: "Error al obtener las tareas"});
        } else {
            res.status(200).send(criptos);
        }
    } catch (error) {
        res.status(500).send(error);
    }
}

async function getCripto(req, res){
    const idCripto = req.params.id;
    try {
        const cripto = await Cripto.findById(idCripto);

        if (!cripto) {
            res.status(400).send({msg : "No se ha encontrado la tarea indicada"})
        } else {
            res.status(200).send(cripto);
        }
    } catch (error) {
        res.status(500).send(error)
    }
}

async function updateCripto(req, res){
    const idCripto = req.params.id;
    const params = req.body;

    try {
        const cripto = await Cripto.findByIdAndUpdate(idCripto,params);

        if (!cripto) {
            res.status(400).send({msg: "No se ha podido actualizar la tarea"});
        } else {
            res.status(200).send({msg: "Actualizacion completada"});
        }
    } catch (error) {
        res.status(500).send(error)
    }
}

async function deleteCripto(req, res){
    const idCripto = req.params.id;

    try {
        const cripto = await Cripto.findByIdAndDelete(idCripto);
        if (!cripto) {
            res.status(400).send({msg: "no se ha podido eliminar la tarea"})
        } else {
            res.status(200).send({msg: "Tarea eliminada correctamente"})
        }
    } catch (error) {
        res.status(500).send(error)
    }
}
module.exports = {
    createCripto,
    getCriptos,
    getCripto,
    updateCripto,
    deleteCripto,
};