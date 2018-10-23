import { Component, OnInit, Input } from '@angular/core';
import { Passageiro } from './passageiro.model';

@Component({
    selector: 'tpu-passageiro',
    templateUrl: './passageiro.component.html',
    styleUrls: ['./passageiro.component.css']
})
export class PassageiroComponent implements OnInit {

    @Input() passageiro: Passageiro;

    public idade: number
    public cpf: string

    constructor() { }

    ngOnInit() {
        let dataString = this.passageiro.dataNascPassageiro;
        let dataNasc = new Date(dataString);
        let timeDiff = Math.abs(Date.now() - dataNasc.getTime());
        this.idade = Math.floor((timeDiff / (1000 * 3600 * 24))/365);
        this.cpf = this.passageiro.cpfPassageiro;
        this.cpf = this.cpf.substring(0,3)+"."+this.cpf.substr(3,3)+"."+this.cpf.substr(6,3)+"-"+this.cpf.substr(9,2);
    }

}
