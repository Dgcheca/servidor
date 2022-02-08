const express = require("express");
const TaskController = require("../controllers/Task");

const api = express.Router();

api.post("/task", TaskController.createTask);
api.get("/task", TaskController.getTasks);
api.get("/task/:id", TaskController.getTask);
api.put("/task/:id", TaskController.updateTask);
api.delete("/task/:id", TaskController.deleteTask);

module.exports = api;