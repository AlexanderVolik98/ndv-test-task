import { Component } from '@angular/core';
import { EmployeeService, Employee } from '../employee.service';

@Component({
  selector: 'app-employee',
  templateUrl: './employee.component.html',
  styleUrls: ['./employee.component.css']
})
export class EmployeeComponent {
  employees: Employee[] = [];
  name: string = '';
  position: string = '';
  editingEmployee: Employee | null = null;
  salary: number = 0;

  constructor(private employeeService: EmployeeService) {
    this.employeeService.getEmployees()
  }

  addEmployee() {
    const newEmployee: Employee = {
      id: Date.now(),
      name: this.name,
      position: this.position,
      salary: this.salary,
    };
    this.employeeService.addEmployee(newEmployee);
    this.clearForm();
  }

  editEmployee(employee: Employee) {
    this.editingEmployee = employee;
    this.name = employee.name;
    this.position = employee.position;
    this.salary = employee.salary;
  }

  updateEmployee() {
    if (this.editingEmployee) {
      this.employeeService.updateEmployee({
        ...this.editingEmployee,
        name: this.name,
        position: this.position,
        salary: this.salary
      });
      this.clearForm();
    }
  }

  deleteEmployee(id: number) {
    this.employeeService.deleteEmployee(id);
  }

  clearForm() {
    this.name = '';
    this.position = '';
    this.editingEmployee = null;
  }
}

