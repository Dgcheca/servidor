const User = require('../models/user.js');
const bcryptjs = require('bcryptjs');

async function register(req, res) {
    const user = new User(req.body);
    const {email, password} = req.body;

    try {
        if (!email) throw { msg: 'El email es obligatorio'};
        if (!password) throw { msg: 'La contraseña es obligatoria'};

        const foundEmail = await User.findOne({email: email});
        if (foundEmail) throw { msg: "El email ya esta en uso"};

        const salt = bcryptjs.genSaltSync(10);
        user.password = await bcryptjs.hash(password, salt);

        user.save();
        res.status(200).send(user);
    } catch (error) {
        res.status(500).send(error);
    }
}

module.exports = {
    register,
};