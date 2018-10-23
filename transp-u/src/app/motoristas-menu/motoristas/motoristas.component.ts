import { Component, OnInit } from '@angular/core';
import { Motorista } from './motorista/motorista.model';
import { MotoristasService } from './motoristas.service';

@Component({
    selector: 'tpu-motoristas',
    templateUrl: './motoristas.component.html',
    styleUrls: ['./motoristas.component.css']
})
export class MotoristasComponent implements OnInit {

    motoristas: Motorista[];

    constructor(private motoristasService: MotoristasService) { }

    ngOnInit() {
        this.motoristasService.motoristas()
        .subscribe(motoristas => this.motoristas = motoristas);
    }

}
