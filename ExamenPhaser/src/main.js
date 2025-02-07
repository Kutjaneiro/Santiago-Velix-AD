import { pantalla01 } from "./escenas/pantalla01.js";
import { gameover } from "./escenas/gameover.js";
import { menu } from "./escenas/menu.js";

var config = {
  type: Phaser.AUTO,
  width: window.innerWidth,
  height: window.innerHeight,

  scene: [menu, pantalla01, gameover],

  physics: {
    default: "arcade",
    arcade: {
      gravity: { y: 0 },
      debug: false,
    },
  },
};

var game = new Phaser.Game(config);
