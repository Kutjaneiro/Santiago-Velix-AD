// Clase `Button`, que representa un botón interactivo en la escena
export class Button {
  // El constructor inicializa el botón con la escena en la que se usará, la imagen del botón, y sus coordenadas (x, y)
  constructor(scene, image, x, y) {
    this.image = image; // Almacena la imagen o sprite que se usará para el botón
    this.relatedScene = scene; // Escena en la que se creará el botón
    this.x = x; // Coordenada X del botón
    this.y = y; // Coordenada Y del botón
  }

  // Método `create` que crea el botón en la escena y le añade interactividad
  create() {
    // Añade el sprite del botón a la escena, en las coordenadas especificadas, y lo hace interactivo
    this.startButton = this.relatedScene.add
      .sprite(this.x, this.y, this.image)
      .setInteractive();

    // Evento que se dispara cuando el cursor pasa sobre el botón (hover)
    this.startButton.on("pointerover", () => {
      this.startButton.setFrame(1); // Cambia el frame (apariencia) del botón al frame 1 cuando el cursor está sobre él
    });

    // Evento que se dispara cuando el cursor deja de estar sobre el botón
    this.startButton.on("pointerout", () => {
      this.startButton.setFrame(0); // Vuelve al frame 0 cuando el cursor se aleja del botón
    });

    // Evento que se dispara cuando el botón es presionado (clic)
    this.startButton.on("pointerdown", () => {
      this.doClick(); // Llama a la función `doClick`, que debe ser definida para realizar alguna acción
    });
  }

  // Método `doClick` que ejecutará la acción cuando el botón sea clicado. Debe ser definido en subclases o modificado en instancias.
  doClick() {
    // Este método debe ser sobreescrito o modificado cuando se instancie esta clase
  }
}
