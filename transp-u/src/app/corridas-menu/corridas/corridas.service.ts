import { Http } from '@angular/http';
import { Injectable } from '@angular/core';
import { Corrida } from './corrida/corrida.model';
import { Observable } from 'rxjs/Observable';
import { API } from '../../app.api';
import 'rxjs/add/operator/map';

@Injectable()
export class CorridasService{

	constructor(private http: Http){}

	corridas(): Observable<Corrida[]>{
		return this.http.get(`${API}/corrida/read-all.php`)
		.map(response => response.json());
	}
}
