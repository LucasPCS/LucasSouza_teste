import {throwError as observableThrowError,  Observable } from 'rxjs';

import { API } from '../../app.api';
import { Component, OnInit } from '@angular/core';
import { FormCorridaService } from './form-corrida.service';
import { Http } from '@angular/http';
import { map } from 'rxjs/operators';

@Component({
    selector: 'tpu-form-corrida',
    templateUrl: './form-corrida.component.html',
    styleUrls: ['./form-corrida.component.css']
})
export class FormCorridaComponent implements OnInit {

    constructor(private formCorridaService: FormCorridaService, private http: Http) { }

    ngOnInit() {
    }

    public data: string;
	public idMotorista: number;
	public idPassageiro: number;
	public nomeMotorista: string;
	public nomePassageiro: string;

    checkForm(form){
		this.formCorridaService.cadastrarCorrida(form)
		.subscribe(
			data => {
				alert("Corrida cadastrada com sucesso!");
				window.location.replace("/corrida/todos");
			},
			error => {
                let message = JSON.parse(error._body);
				alert("Erro ao cadastrar corrida! "+message.message);
				return observableThrowError(error);
			}
		);
	}

    procurarMotorista(idMotorista){
		if(idMotorista.target.value===""){
			this.nomeMotorista = "";
		}
		this.idMotorista=idMotorista.target.value;
		let toSub = this.seekMotorista();
		toSub.subscribe(
			data => this.nomeMotorista = data.nomeMotorista,
			error => console.log(JSON.stringify(error)),
		);
	}

    seekMotorista(){
		return this.http.get(`${API}/motorista/read-one.php?idMotorista=${this.idMotorista}`).pipe(
		map(response => response.json()));
	}

	procurarPassageiro(idPassageiro){
		if(idPassageiro.target.value===""){
			this.nomePassageiro = "";
		}
		this.idPassageiro=idPassageiro.target.value;
		let toSub = this.seekPassageiro();
		toSub.subscribe(
			data => this.nomePassageiro = data.nomePassageiro,
			error => console.log(JSON.stringify(error)),
		);
	}

	seekPassageiro(){
		return this.http.get(`${API}/passageiro/read-one.php?idPassageiro=${this.idPassageiro}`).pipe(
		map(response => response.json()));
	}
}
