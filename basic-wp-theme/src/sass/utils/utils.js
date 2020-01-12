const path = require("path");

const resources = [
  "_variables.scss",
  "_mixins.scss",
  "_extendables.scss"
]

module.exports = resources.map(file => path.resolve(__dirname, file));
