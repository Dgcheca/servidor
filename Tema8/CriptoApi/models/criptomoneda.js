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
        type: Number,
        require: true,
    },
    variacion: {
        type: Number,
        require: true,
    },
    capitalizacion: {
        type: Number,
        require: true,
    }
});

module.exports = mongoose.model("criptomoneda", CriptoSchema);