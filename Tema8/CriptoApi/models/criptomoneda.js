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
        type: Integer,
        require: true,
    },
    variacion: {
        type: Integer,
        require: true,
    },
    capitalizacion: {
        type: String,
        require: true,
    }
});

module.exports = mongoose.model("Criptomoneda", CriptoSchema);

//id, nombre, símbolo (3 letras), descripción breve, precio
// actual en euros, porcentaje de cambio de valor en 24h, capitalización (cuántas monedas hay
// en circulación)