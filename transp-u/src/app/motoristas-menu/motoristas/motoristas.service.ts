import { Http } from '@angular/http';
import { Injectable } from '@angular/core';
import { Motorista } from './motorista/motorista.model';
import { Observable } from 'rxjs/Observable';
import { API } from '../../app.api';
import 'rxjs/add/operator/map';

@Injectable()
export class MotoristasService{

    constructor(private http: Http){}

    motoristas(): Observable<Motorista[]>{
        return this.http.get(`${API}/motorista/read-all.php`)
        .map(response => response.json());
    }
}
