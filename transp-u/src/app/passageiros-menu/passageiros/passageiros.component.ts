import { Component, OnInit } from '@angular/core';
import { Passageiro } from './passageiro/passageiro.model';
import { PassageirosService } from './passageiros.service';

@Component({
    selector: 'tpu-passageiros',
    templateUrl: './passageiros.component.html',
    styleUrls: ['./passageiros.component.css']
})
export class PassageirosComponent implements OnInit {
    
    passageiros: Passageiro[];

    constructor(private passageirosService: PassageirosService) { }

    ngOnInit() {
        this.passageirosService.passageiros()
        .subscribe(passageiros => this.passageiros = passageiros);
    }

}
