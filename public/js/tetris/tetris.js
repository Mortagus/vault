class Tetris {

    constructor() {
        this.initVar();
    }

    initVar() {
        this.a = 5;
    }

    changeA() {
        this.a = 42;
        return this.a;
    }


}

const game = new Tetris();
console.log(game.a);
console.log(game.changeA());