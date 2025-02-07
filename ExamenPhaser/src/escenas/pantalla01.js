export class pantalla01 extends Phaser.Scene {
  constructor() {
    super({ key: "pantalla01" });
  }

  preload() {
    this.load.image("dude", "/assets/dude.png");
    this.load.image("dude1", "/assets/dude1.png");
    this.load.image("torpedo", "/assets/torpedo.png");
  }

  create() {
    this.player1 = this.add.sprite(50, this.scale.height / 2, "dude1");
    this.player2 = this.add.sprite(
      this.scale.width - 50,
      this.scale.height / 2,
      "dude"
    );

    this.bullets1 = this.physics.add.group();
    this.bullets2 = this.physics.add.group();

    this.controlesJugador1 = this.input.keyboard.addKeys("W,S,D");
    this.cursors = this.input.keyboard.createCursorKeys();

    this.municionJugador1 = 10;
    this.municionJugador2 = 10;

    this.municionJugador1Text = this.add.text(20, 20, "Munición J1: 10", {
      fontSize: "16px",
      fill: "#fff",
    });
    this.municionJugador2Text = this.add.text(
      this.scale.width - 170,
      20,
      "Munición J2: 10",
      { fontSize: "16px", fill: "#fff" }
    );

    this.lastFired1 = 0;
    this.lastFired2 = 0;

    this.physics.world.setBoundsCollision(true, true, true, true);

    this.physics.add.existing(this.player1);
    this.physics.add.existing(this.player2);

    this.player1.body.setCollideWorldBounds(true);
    this.player2.body.setCollideWorldBounds(true);

    this.rectangulo1 = this.add.rectangle(
      this.scale.width / 2 - 100,
      this.scale.height / 2,
      20,
      100,
      0xff0000
    );
    this.rectangulo2 = this.add.rectangle(
      this.scale.width / 2 + 100,
      this.scale.height / 2,
      20,
      100,
      0xff0000
    );

    this.physics.add.existing(this.rectangulo1);
    this.physics.add.existing(this.rectangulo2);

    this.rectangulo1.body.setCollideWorldBounds(true);
    this.rectangulo2.body.setCollideWorldBounds(true);

    this.rectangulo1.body.setVelocityY(100);
    this.rectangulo2.body.setVelocityY(-100);

    this.physics.add.overlap(
      this.bullets1,
      this.player2,
      this.golpearJugador2,
      null,
      this
    );

    this.physics.add.overlap(
      this.bullets2,
      this.player1,
      this.GolpearJugador1,
      null,
      this
    );

    this.physics.add.overlap(
      this.bullets1,
      this.bullets2,
      this.golpearBalas,
      null,
      this
    );

    this.physics.add.overlap(
      this.bullets1,
      this.rectangulo1,
      this.golpearRectangulo,
      null,
      this
    );

    this.physics.add.overlap(
      this.bullets2,
      this.rectangulo2,
      this.golpearRectangulo,
      null,
      this
    );
  }

  update(time) {
    if (this.controlesJugador1.W.isDown) {
      this.player1.y -= 5;
    } else if (this.controlesJugador1.S.isDown) {
      this.player1.y += 5;
    }

    if (this.cursors.up.isDown) {
      this.player2.y -= 5;
    } else if (this.cursors.down.isDown) {
      this.player2.y += 5;
    }

    if (
      this.controlesJugador1.D.isDown &&
      this.municionJugador1 > 0 &&
      time > this.lastFired1
    ) {
      this.dispararBala(this.player1, this.bullets1);
      this.municionJugador1--;
      this.lastFired1 = time + 300;
      this.municionJugador1Text.setText(
        "Munición J1: " + this.municionJugador1
      );
    }

    if (
      this.cursors.left.isDown &&
      this.municionJugador2 > 0 &&
      time > this.lastFired2
    ) {
      this.dispararBala(this.player2, this.bullets2);
      this.municionJugador2--;
      this.lastFired2 = time + 300;
      this.municionJugador2Text.setText(
        "Munición J2: " + this.municionJugador2
      );
    }

    this.ajustarAPantalla(this.player1);
    this.ajustarAPantalla(this.player2);

    if (
      this.rectangulo1.body.blocked.up ||
      this.rectangulo1.body.blocked.down
    ) {
      this.rectangulo1.body.setVelocityY(-this.rectangulo1.body.velocity.y);
    }
    if (
      this.rectangulo2.body.blocked.up ||
      this.rectangulo2.body.blocked.down
    ) {
      this.rectangulo2.body.setVelocityY(-this.rectangulo2.body.velocity.y);
    }

    if (this.municionJugador1 === 0 && this.municionJugador2 === 0) {
      this.scene.start("gameover", { winner: "EMPATE" });
    }
  }

  dispararBala(player, bulletsGroup) {
    const bullet = bulletsGroup.create(
      player.x + player.width / 2,
      player.y,
      "torpedo"
    );

    bullet.setVelocityX(player.x < this.scale.width / 2 ? 800 : -800);
    bullet.body.setAllowGravity(false);
  }

  ajustarAPantalla(player) {
    if (player.y < 50) {
      player.y = 50;
    } else if (player.y > this.scale.height - 50) {
      player.y = this.scale.height - 50;
    }
  }

  golpearJugador2(bullet, player2) {
    bullet.destroy();
    console.log("Jugador 1 ha golpeado a Jugador 2");
    this.scene.start("gameover", { winner: "Jugador 1" });
  }

  GolpearJugador1(bullet, player1) {
    bullet.destroy();
    console.log("Jugador 2 ha golpeado a Jugador 1");
    this.scene.start("gameover", { winner: "Jugador 2" });
  }

  golpearBalas(bullet1, bullet2) {
    bullet1.destroy();
    bullet2.destroy();
    console.log("Dos balas se han chocado");
  }

  golpearRectangulo(bullet, rectangle) {
    if (bullet.active) {
      bullet.destroy();
      console.log("Una bala ha golpeado un rectángulo");
    }
  }
}
