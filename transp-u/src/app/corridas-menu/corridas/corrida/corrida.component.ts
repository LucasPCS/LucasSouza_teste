import { Component, OnInit, Input } from '@angular/core';
import { Corrida } from './corrida.model';

@Component({
    selector: 'tpu-corrida',
    templateUrl: './corrida.component.html',
    styleUrls: ['./corrida.component.css']
})
export class CorridaComponent implements OnInit {

    @Input() corrida: Corrida;
    constructor() { }

    ngOnInit() {
    }

}
