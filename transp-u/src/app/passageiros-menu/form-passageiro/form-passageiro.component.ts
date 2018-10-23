import { Component, OnInit } from '@angular/core';
import { FormPassageiroService } from './form-passageiro.service';
import { Observable } from 'rxjs';
import { Router } from '@angular/router';

@Component({
    selector: 'tpu-form-passageiro',
    templateUrl: './form-passageiro.component.html',
    styleUrls: ['./form-passageiro.component.css']
})
export class FormPassageiroComponent implements OnInit {

    constructor(private formPassageiroService: FormPassageiroService, public router: Router) { }

    ngOnInit() {
    }

    public data: string;

    checkFormP(form){
		this.formPassageiroService.cadastrarPassageiro(form).subscribe(
			() => {
				alert("Passageiro cadastrado com sucesso!");
				window.location.replace("/passageiro/todos");;
			},
			() => {console.error("Erro ao cadastrar passageiro");}
		);
	}
}
