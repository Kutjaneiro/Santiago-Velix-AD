export class gameover extends Phaser.Scene {
  constructor() {
    super({ key: "gameover" });
  }

  init(data) {
    this.winner = data.winner;
  }

  create() {
    let message =
      this.winner === "EMPATE" ? "EMPATE" : `El ${this.winner} Gana!`;
    this.add
      .text(400, 200, message, {
        fontSize: "64px",
        fill: "#fff",
      })
      .setOrigin(0.5);
    this.add
      .text(400, 400, "Haz clic para volver al menú", {
        fontSize: "32px",
        fill: "#fff",
      })
      .setOrigin(0.5);

    this.input.on("pointerdown", () => {
      this.scene.start("menu");
    });
  }
}
