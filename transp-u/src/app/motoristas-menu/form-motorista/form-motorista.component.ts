import {throwError as observableThrowError,  Observable } from 'rxjs';
import { Component, OnInit } from '@angular/core';
import { FormMotoristaService } from './form-motorista.service';
import { Router } from '@angular/router';

@Component({
    selector: 'tpu-form-motorista',
    templateUrl: './form-motorista.component.html',
    styleUrls: ['./form-motorista.component.css']
})
export class FormMotoristaComponent implements OnInit {

    constructor(private formMotoristaService: FormMotoristaService) { }

    ngOnInit() {
    }

    public data: string;

    checkForm(form){
        this.formMotoristaService.cadastrarMotorista(form)
        .subscribe(
            data => {
                alert("Motorista cadastrado com sucesso!");
                window.location.replace("/motorista/todos");
            },
            error => {
                console.error("Erro ao cadastrar motorista");
                return observableThrowError(error);
            }
        );
    }
}
