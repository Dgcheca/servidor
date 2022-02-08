const mongoose = require("mongoose");
const Schema = mongoose.Schema;

const CriptoSchema = Schema({
    nombre: {
        type: String,
        require: true
    },
    simbolo: {
        type: String,
        require: true,
    },
    descripcion: {
        type: String,
        require: true,
    },
    precio: {
        type: String,
        require: true,
    },
    variacion: {
        type: String,
        require: true,
    },
    capitalizacion: {
        type: String,
        require: true,
    }
});

module.exports = mongoose.model("criptomoneda", CriptoSchema);