import { Injectable } from '@angular/core';
import { BehaviorSubject } from 'rxjs';
import {HttpClient} from "@angular/common/http";

export interface Employee {
  id: number;
  name: string;
  position: string;
  salary: number;
}

@Injectable({
  providedIn: 'root'
})
export class EmployeeService {
  private employees: Object = [];
  // private employeeSubject = new BehaviorSubject<Employee[]>(this.employees);

  private url = 'http://0.0.0.0/api/v1/employees'

  constructor(private http: HttpClient) {

  }

  getEmployees() {
    let req = this.http.get(this.url, {
      headers: {
        'Access-Control-Allow-Origin': '*'
      }
    });

    this.http.get(this.url).subscribe(
      employees => this.employees = employees
    );

    return this.employees
  }

  addEmployee(employee: Employee) {
    // this.employees.push(employee);
    // this.employeeSubject.next(this.employees);
  }

  updateEmployee(updatedEmployee: Employee) {
    // const index = this.employees.findIndex(emp => emp.id === updatedEmployee.id);
    // if (index !== -1) {
      // this.employees[index] = updatedEmployee;
      // this.employeeSubject.next(this.employees);
    }


  deleteEmployee(id: number) {
    // this.employees = this.employees.filter(emp => emp.id !== id);
    // this.employeeSubject.next(this.employees);
  }
}

