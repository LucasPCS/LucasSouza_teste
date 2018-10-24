import { map } from 'rxjs/operators';
import { Http, Headers, RequestOptions, Response } from '@angular/http';
import { Injectable } from '@angular/core';
import { FormMotorista } from './form-motorista.model';
import { API } from '../../app.api';


@Injectable()
export class FormMotoristaService{

	constructor(private http: Http){}

	cadastrarMotorista(formMotorista: FormMotorista){
		let headers = new Headers({'Content-Type':'application/json'});
		let request = new RequestOptions({headers: headers})
		let body = JSON.stringify(formMotorista);
		return this.http.post(`${API}/motorista/create.php`, body, request).pipe(map((message: Response) => message.json()));
	}
}
