const express = require("express");
const CriptoController = require("../controllers/criptomoneda");

const api = express.Router();

api.post("/cripto", CriptoController.createCripto);
api.get("/cripto", CriptoController.getCriptos);
api.get("/cripto/:id", CriptoController.getCripto);
api.put("/cripto/:id", CriptoController.updateCripto);
api.delete("/cripto/:id", CriptoController.deleteCripto);

module.exports = api;