class Tetris {

    constructor() {
        this.canvas = document.getElementById('tetris');
        this.context = this.canvas.getContext('2d');

        // time related variables
        this.lastTime = 0;
        this.dropCounter = 0;
        this.dropInterval = 1000;

        this.arena = [];
        this.currentPiece = new Tetroid([
            [0, 0, 0],
            [1, 1, 1],
            [0, 1, 0],
        ], {x: 4, y: 0}, 'red');

    }

    start() {
        this.initContext();
        this.initKeyboardControl();
        this.initArena(12, 20);
        this.update();
    };

    initContext() {
        this.context.scale(20, 20);
    }

    initKeyboardControl() {
        document.addEventListener('keydown', event => {
            switch (event.keyCode) {
                case 37:
                    this.tetroidMove(-1);
                    break;
                case 39:
                    this.tetroidMove(1);
                    break;
                case 40:
                    this.dropTetroid();
                    break;
            }
        });
    }

    initArena(w, h) {
        this.arena = [];
        while (h--) {
            this.arena.push(new Array(w).fill(0));
        }
    }

    saveCurrentPieceIntoArena() {
        this.currentPiece.matrix.forEach((row, y) => {
            row.forEach((value, x) => {
                if (value !== 0) {
                    this.arena[y + this.currentPiece.position.y][x + this.currentPiece.position.x] = value;
                }
            });
        });
    }

    collide() {
        const m = this.currentPiece.matrix;
        const o = this.currentPiece.position;
        for (let y = 0; y < m.length; ++y) {
            for (let x = 0; x < m[y].length; ++x) {
                if (m[y][x] !== 0 &&
                    (this.arena[y + o.y] &&
                        this.arena[y + o.y][x + o.x]) !== 0) {
                    return true;
                }
            }
        }
        return false;
    }

    tetroidMove(offset) {
        this.currentPiece.position.x += offset;
        if (this.collide()) {
            this.currentPiece.position.x -= offset;
        }
    }

    dropTetroid() {
        this.currentPiece.position.y++;
        if (this.collide()) {
            this.currentPiece.position.y--;
            this.saveCurrentPieceIntoArena();
            this.currentPiece.position.y = 0;
        }
        this.dropCounter = 0;
    }

    update(time = 0) {
        const deltaTime = time - this.lastTime;
        this.lastTime = time;

        this.dropCounter += deltaTime;
        if (this.dropCounter > this.dropInterval) {
            this.dropTetroid();
        }

        this.drawAll();
        requestAnimationFrame(this.update.bind(this));
    }

    drawAll() {
        this.drawField();
        this.drawArena();
        this.drawMatrix(this.currentPiece.matrix, this.currentPiece.position, this.currentPiece.color);
    }

    drawField() {
        this.context.fillStyle = '#e1c89f';
        this.context.fillRect(0, 0, this.canvas.width, this.canvas.height);
    }

    drawArena() {
        this.drawMatrix(this.arena, {x: 0, y: 0}, 'red');
    }

    drawMatrix(matrix, offset, color) {
        matrix.forEach((row, y) => {
            row.forEach((value, x) => {
                if (value !== 0) {
                    this.context.fillStyle = color;
                    this.context.fillRect(
                        x + offset.x,
                        y + offset.y,
                        1, 1);
                }
            });
        });
    }
}

class Tetroid {

    constructor(matrix, pos, color) {
        this.matrix = matrix;
        this.position = pos;
        this.color = color;
    }

}

const game = new Tetris();
game.start();