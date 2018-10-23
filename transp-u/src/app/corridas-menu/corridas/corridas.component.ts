import { Component, OnInit } from '@angular/core';
import { Corrida } from './corrida/corrida.model';
import { CorridasService } from './corridas.service';

@Component({
    selector: 'tpu-corridas',
    templateUrl: './corridas.component.html',
    styleUrls: ['./corridas.component.css']
})
export class CorridasComponent implements OnInit {

    corridas: Corrida[];

    constructor(private corridasService: CorridasService) { }

    ngOnInit() {
        this.corridasService.corridas()
		.subscribe(corridas => this.corridas = corridas);
    }

}
