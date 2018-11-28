@extends('template.layout')
@section('title', 'Home')
@section('content')
    <div class="container">
        <div class="columns personal-menu text-center vertical-center margin0">
            <div class="column">
                Zona de pruebas
            </div>
        </div>
        <div class="columns margin0 tile">
            <div class="column is-2 line-der">
                <aside class="menu">
                    <p class="menu-label">
                        Menu Principal
                    </p>
                    <ul class="menu-list">
                        <li @click="menu=0" class="hand-option"><a
                                    :class="{'is-active' : menu==0 }">Dashboard</a></li>
                        <li @click="menu=1" class="hand-option"><a :class="{'is-active' : menu==1 }">Departamentos</a>
                        </li>
                        <li @click="menu=2" class="hand-option"><a
                                    :class="{'is-active' : menu==2 }">Cargos</a></li>
                        <li @click="menu=3" class="hand-option"><a
                                    :class="{'is-active' : menu==3 }">Funcionarios</a></li>
                    </ul>
                </aside>
            </div>
            <div class="column personal-content" v-if="menu==0">
                <div class="columns text-center">
                    <div class="column">
                        <h3>Dashboard</h3>
                    </div>
                </div>
                <div class="columns text-center">
                    <div class="column">
                        <h1>Bienvenido</h1>
                    </div>
                </div>
            </div>
            <div class="column" v-if="menu==1">
                <div class="columns">
                    <div class="column text-center">
                        <h3>Departamentos</h3>
                    </div>
                    <div class="column">
                        <a class="button is-success" @click="openModal('dpto','create')">Agregar Departamento</a>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <div v-if="!dptos.length">
                            No hay departamentos
                        </div>
                        <table v-else class="table">
                            <thead>
                            <th>#</th>
                            <th>Titulo</th>
                            <th>Eliminar</th>
                            <th>Editar</th>
                            </thead>
                            <tbody>
                            <tr v-for="dpto in dptos">
                                <td>@{{ dpto.id }}</td>
                                <td>@{{ dpto.nombre }}</td>
                                <td @click="openModal('dpto','delete',dpto)">
                                    <i class="fa fa-ban" aria-hidden="true"></i>
                                </td>
                                <td @click="openModal('dpto','update',dpto)">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="column" v-if="menu==2">
                <div class="columns">
                    <div class="column text-center">
                        <h3>Cargos</h3>
                    </div>
                    <div class="column" v-if="dptos.length">
                        <a class="button is-success" @click="openModal('cargo','create')">Agregar Cargo</a>
                    </div>
                    <div class="column" v-else>
                        <span class="text-danger">Debe existir un departamento por lo menos</span>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <div v-if="!cargos.length">
                            No hay Cargos
                        </div>
                        <table v-else class="table">
                            <thead>
                            <th>#</th>
                            <th>Titulo</th>
                            <th>Departamento</th>
                            <th>Eliminar</th>
                            <th>Editar</th>
                            </thead>
                            <tbody>
                            <tr v-for="cargo in cargos">
                                <td>@{{ cargo.id }}</td>
                                <td>@{{ cargo.nombre }}</td>
                                <td>@{{ cargo.dpto.nombre }}</td>
                                <td @click="openModal('cargo','delete',cargo)">
                                    <i class="fa fa-ban" aria-hidden="true"></i>
                                </td>
                                <td @click="openModal('cargo','update',cargo)">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="column" v-if="menu==3">
                <div class="columns">
                    <div class="column text-center">
                        <h3>Funcionario</h3>
                    </div>
                    <div class="column" v-if="cargos.length">
                        <a class="button is-success" @click="openModal('funcionario','create')">Agregar Funcionario</a>
                    </div>
                    <div class="column" v-else>
                        <span class="text-danger">Debe existir un cargo por lo menos</span>
                    </div>
                </div>
                <div class="columns">
                    <div class="column is-12">
                        <div v-if="!funcionario.length">
                            No hay Funcionarios
                        </div>
                        <table v-else class="table" style="font-size: 10px">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Correo</th>
                                <th>Fecha de nacimiento</th>
                                <th>Edad</th>
                                <th>Cargo</th>
                                <th>Departamento</th>
                                <th>Eliminar</th>
                                <th>Editar</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="funcionario in funcionarios">
                                <td>@{{ funcionario.id }}</td>
                                <td>@{{ funcionario.name }}</td>
                                <td>@{{ funcionario.lastname }}</td>
                                <td>@{{ funcionario.email }}</td>
                                <td>@{{ funcionario.birthday }}</td>
                                <td>@{{ funcionario.years }}</td>
                                <td>@{{ funcionario.cargo.nombre }}</td>
                                <td>@{{ funcionario.dpto.nombre }}</td>
                                <td @click="openModal('funcionario','delete',funcionario)">
                                    <i class="fa fa-ban" aria-hidden="true"></i>
                                </td>
                                <td @click="openModal('funcionario','update',funcionario)">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="columns margin0 text-center vertical-center personal-menu">
            <div class="column">Funcionarios 0</div>
            <div class="column">Departamentos @{{ dptos.length }}</div>
            <div class="column">Cargo @{{ cargos.length }}</div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal" :class="{'is-active' : modalGeneral}">
        <div class="modal-background"></div>
        <div class="modal-content">
            <div class="content">
                <h3 class="text-center">@{{nombreModal}}</h3>
                <div class="field">
                    <label class="label">@{{messageModal}}</label>
                    <p class="control" v-if="modalDpto">
                        <input class="input" placeholder="Departamento" v-model="nombreDpto"
                               :readonly="modalDpto==3">
                    </p>
                    <div v-show="errorNombreDpto" class="columns text-center">
                        <div class="column text-center text-danger">
                            El nombre del Departamento no puede estar vacio
                        </div>
                    </div>
                    <p class="control" v-if="modalCargo">
                        <input class="input" placeholder="Cargo" v-model="nombreCargo" :readonly="modalCargo==3">
                        <select class="select" :disabled="modalCargo==3" v-model="idDptoCargo">
                            <option v-for="dpto in  dptos" :value="dpto.id">@{{ dpto.nombre }}
                            </option>
                        </select>
                    </p>
                    <div v-show="errorNombreCargo" class="columns text-center">
                        <div class="column text-center text-danger">
                            El nombre del Cargo no puede estar vacio
                        </div>
                    </div>
                    <p class="control" v-if="modalFuncionario">
                        <input class="input" :readonly="modalFuncionario==3" placeholder="Nombre" v-model="nameFuncionario">
                        <input class="input" :readonly="modalFuncionario==3" placeholder="Apellido" v-model="lastnameFuncionario">
                        <input class="input" :readonly="modalFuncionario==3" placeholder="Correo" v-model="emailFuncionario">
                        <birthdayPicker :birthday.sync="birthdayFuncionario"
                                        v-if="modalFuncionario==1 || modalFuncionario==2"
                                        :today="birthdayFuncionario"></birthdayPicker>
                        <input class="input" v-model="birthdayFuncionario" readonly v-if="modalFuncionario==3">
                        <label>Departamento: </label>
                        <select class="select" :disabled="modalFuncionario==3" v-model="idFilterDpto">
                            <option v-for="dpto in filterDpto" :value="dpto.id">@{{ dpto.nombre }}
                            </option>
                        </select>
                        <label>Cargo: </label>
                        <select class="select" :disabled="modalFuncionario==3" v-model="idFilterCargo">
                            <option v-for="cargo in filtercargo" :value="cargo.id">@{{ cargo.nombre }}
                            </option>
                        </select>
                    </p>
                    <div v-show="errorFuncionario" class="columns text-center">
                        <div class="column text-center text-danger">
                            <div v-for="error in errorMessageFuncionario">
                                @{{ error }}
                            </div>
                        </div>
                    </div>
                    <div class="columns button-content">
                        <div class="column">
                            <a class="button is-success" @click="createDpto()" v-if="modalDpto==1">Aceptar</a>
                            <a class="button is-success" @click="updateDpto()" v-if="modalDpto==2">Aceptar</a>
                            <a class="button is-success" @click="destroyDpto()" v-if="modalDpto==3">Aceptar</a>
                            <a class="button is-success" @click="createCargo()" v-if="modalCargo==1">Aceptar</a>
                            <a class="button is-success" @click="updateCargo()" v-if="modalCargo==2">Aceptar</a>
                            <a class="button is-success" @click="destroyCargo()" v-if="modalCargo==3">Aceptar</a>
                            <a class="button is-success" @click="createFuncionario()" v-if="modalFuncionario==1">Aceptar</a>
                            <a class="button is-success" @click="updateFuncionario()" v-if="modalFuncionario==2">Aceptar</a>
                            <a class="button is-success" @click="destroyFuncionario()" v-if="modalFuncionario==3">Aceptar</a>
                        </div>
                        <div class="column">
                            <a class="button is-danger" @click="closeModal()">Cancelar</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="modal-close" @click="closeModal()"></button>
        </div>
    </div>
    <!-- -->
@endsection
@section('script')
    <script>
        let elemento = new Vue({
            el: '.app',
            mounted: function () {
                this.allQuery();
            },
            data: {
                menu: 0,
                modalGeneral: 0,
                nombreModal: '',
                messageModal: '',
                /***** Dpto *****/
                modalDpto: 0,
                nombreDpto: '',
                errorNombreDpto: 0,
                dptos: [],
                /********* cargo ***********/
                cargos: [],
                modalCargo: 0,
                nombreCargo: '',
                errorNombreCargo: 0,
                idDptoCargo: 0,
                idCargo: 0,
                /*************** Funcionario **********/
                idFuncionario: 0,
                funcionario: [],
                modalFuncionario: 0,
                nameFuncionario: '',
                lastnameFuncionario: '',
                emailFuncionario: '',
                birthdayFuncionario: '',
                idFilterDpto: 0,
                filterDpto: [],
                idFilterCargo: 0,
                filterCargo: [],
                errorFuncionario: 0,
                errorMessageFuncionario: [],
                nowatch: 0,
            },
            watch: {
                modalGeneral: function (value) {
                    if (!value) this.allQuery();
                },
                idFilterDpto: function (value) {
                    let me = this;
                    this.filterDpto.map(function (x) {
                        if (x.id === value) {
                            me.filterCargo = x.cargos;
                            if (!me.nowatch) {
                                me.idFilterCargo = me.filterCargo[0].id;
                            }
                            else {
                                me.idFilterCargo = me.nowatch;
                            }
                        }
                    });
                    this.nowatch = 0;
                }
            },
            methods: {
                validateFuncionario() {
                    this.errorFuncionario = 0;
                    this.errorMessageFuncionario = [];
                    if (!this.nameFuncionario) this.errorMessageFuncionario.push('El nombre no puede estar vacio');
                    if (!this.lastnameFuncionario) this.errorMessageFuncionario.push("El apellido no puede estar vacio");
                    if (!this.emailFuncionario) this.errorMessageFuncionario.push('El correo electronico no puede estar vacio');
                    if (!this.birthdayFuncionario) this.errorMessageFuncionario.push('La fecha de nacimiento no puede estar vacia');
                    if (this.errorMessageFuncionario.length) this.errorFuncionario = 1;
                    return this.errorFuncionario;
                },
                allQuery() {
                    let me = this;
                    axios.get('{{route('allQuery')}}')
                        .then(function (response) {
                            let answer = response.data;
                            me.dptos = answer.dptos;
                            me.cargos = answer.cargos;
                            me.funcionario = answer.funcionario;
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                },
                createFuncionario() {
                    if (this.validateFuncionario()) {
                        return;
                    }
                    let me = this;
                    axios.post('{{route('funcionariocreate')}}', {
                        'name': this.nameFuncionario,
                        'lastname': this.lastnameFuncionario,
                        'email': this.emailFuncionario,
                        'birthday': this.birthdayFuncionario,
                        'cargo': this.idFilterCargo
                    })
                        .then(function (response) {
                            me.errorMessageFuncionario = [];
                            me.errorFuncionario = 0;
                            if (response.data.date) {
                                me.errorFuncionario = 1;
                                me.errorMessageFuncionario.push(response.data.date[0]);
                            } else {
                                me.nameFuncionario = '';
                                me.lastnameFuncionario = '';
                                me.emailFuncionario = '';
                                me.birthdayFuncionario = '';
                                me.idFilterCargo = 0;
                                me.errorFuncionario = 0;
                                me.errorMessageFuncionario = [];
                                me.modalFuncionario = 0;
                                me.closeModal();
                            }
                        })
                        .catch(function (error) {
                            me.errorMessageFuncionario = [];
                            me.errorFuncionario = 0;
                            if (error.response && error.response.status === 500) {
                                console.log(error.response.data)
                            }
                            if (error.response && error.response.status === 422) {
                                me.errorFuncionario = 1;
                                error.response.data.email.forEach(function (element) {
                                    me.errorMessageFuncionario.push(element);
                                });
                                console.clear();
                            } else {
                                console.log(error);
                            }
                        });
                },
                updateFuncionario() {
                    if (this.validateFuncionario()) {
                        return;
                    }
                    let me = this;
                    axios.put('{{route('funcionarioupdate')}}', {
                        'id': this.idFuncionario,
                        'name': this.nameFuncionario,
                        'lastname': this.lastnameFuncionario,
                        'email': this.emailFuncionario,
                        'birthday': this.birthdayFuncionario,
                        'cargo': this.idFilterCargo
                    })
                        .then(function (response) {
                            me.errorMessageFuncionario = [];
                            me.errorFuncionario = 0;
                            if (response.data.date) {
                                me.errorFuncionario = 1;
                                me.errorMessageFuncionario.push(response.data.date[0]);
                            } else {
                                me.nameFuncionario = '';
                                me.lastnameFuncionario = '';
                                me.emailFuncionario = '';
                                me.birthdayFuncionario = '';
                                me.idFilterCargo = 0;
                                me.errorFuncionario = 0;
                                me.errorMessageFuncionario = [];
                                me.modalFuncionario = 0;
                                me.closeModal();
                            }
                        })
                        .catch(function (error) {
                            me.errorMessageFuncionario = [];
                            me.errorFuncionario = 0;
                            if (error.response && error.response.status === 500) {
                                console.log(error.response.data)
                            }
                            if (error.response && error.response.status === 422) {
                                me.errorFuncionario = 1;
                                me.errorMessageFuncionario=error.response.data.email;
                                console.clear();
                            } else {
                                console.log(error);
                            }
                        });
                },
                destroyFuncionario() {
                    let me = this;
                    axios.delete('{{url('/funcionario/delete')}}' + '/' + this.idFuncionario)
                        .then(function (response) {
                            me.nameFuncionario = '';
                            me.lastnameFuncionario = '';
                            me.emailFuncionario = '';
                            me.birthdayFuncionario = '';
                            me.idFilterCargo = 0;
                            me.errorFuncionario = 0;
                            me.errorMessageFuncionario = [];
                            me.modalFuncionario = 0;
                            me.closeModal();
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                },
                updateCargo() {
                    if (this.nombreCargo == '') {
                        this.errorNombreCargo = 1;
                        return;
                    }
                    let me = this;
                    axios.put('{{route('cargoupdate')}}', {
                        'id': this.idCargo,
                        'nombre': this.nombreCargo,
                        'dpto': this.idDptoCargo
                    })
                        .then(function (response) {
                            me.NombreCargo = '';
                            me.errorNombreCargo = 0;
                            me.modalCargo = 0;
                            me.idDptoCargo = 0;
                            me.idCargo = 0;
                            me.closeModal();
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                },
                destroyCargo() {
                    let me = this;
                    axios.delete('{{url('/cargo/delete')}}' + '/' + this.idCargo)
                        .then(function (response) {
                            me.nombreCargo = '';
                            me.errorNombreCargo = 0;
                            me.modalCargo = 0;
                            me.idDptoCargo = 0;
                            me.idCargo = 0;
                            me.closeModal();
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                },
                createCargo() {
                    if (this.nombreCargo == '') {
                        this.errorNombreCargo = 1;
                        return;
                    }
                    let me = this;
                    axios.post('{{route('cargocreate')}}', {
                        'nombre': this.nombreCargo,
                        'dpto': this.idDptoCargo
                    })
                        .then(function (response) {
                            me.nombreCargo = '';
                            me.errorNombreCargo = 0;
                            me.modalCargo = 0;
                            me.idDptoCargo = 0;
                            me.closeModal();
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                },
                updateDpto() {
                    if (this.nombreDpto == '') {
                        this.errorNombreDpto = 1;
                        return;
                    }
                    let me = this;
                    axios.put('{{route('dptoupdate')}}', {
                        'nombre': this.nombreDpto,
                        'id': this.idDpto
                    })
                        .then(function (response) {
                            me.nombreDpto = '';
                            me.idDpto = 0;
                            me.errorNombreDpto = 0;
                            me.modalDpto = 0;
                            me.closeModal();
                        })
                        .catch(function (error) {
                            console.log('error: ' + error);
                        });
                },
                closeModal() {
                    this.modalGeneral = 0;
                    this.nombreModal = '';
                    this.messageModal = '';
                    this.modalDpto = 0;
                    this.modalCargo = 0;
                    this.modalFuncionario = 0;
                    this.nowatch=0;
                    this.idFilterDpto=0;
                },
                destroyDpto() {
                    let me = this;
                    axios.delete('{{url('/dpto/delete')}}' + '/' + this.idDpto)
                        .then(function (response) {
                            me.idDpto = 0;
                            me.nombreDpto = '';
                            me.modalDpto = 0;
                            me.closeModal();
                        })
                        .catch(function (error) {
                            console.log('error: ' + error);
                        });
                },
                createDpto() {
                    if (this.nombreDpto == '') {
                        this.errorNombreDpto = 1;
                        return;
                    }
                    let me = this;
                    axios.post('{{route('dptocreate')}}', {
                        'nombre': this.nombreDpto
                    })
                        .then(function (response) {
                            me.nombreDpto = '';
                            me.errorNombreDpto = 0;
                            me.modalDpto = 0;
                            me.closeModal();
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                },
                openModal(type, action, data = []) {
                    switch (type) {
                        case "dpto": {
                            switch (action) {
                                case 'create': {
                                    this.modalGeneral = 1;
                                    this.nombreModal = 'Creación de Departamento';
                                    this.messageModal = 'Ingrese el titulo del departamento';
                                    this.modalDpto = 1;
                                    this.nombreDpto = '';
                                    this.errorNombreDpto = 0;
                                    break;
                                }
                                case 'update': {
                                    this.modalGeneral = 1;
                                    this.nombreModal = 'Modificación de Departamento';
                                    this.messageModal = 'Modifique el titulo del departamento';
                                    this.modalDpto = 2;
                                    this.nombreDpto = data['nombre'];
                                    this.errorNombreDpto = 0;
                                    this.idDpto = data['id'];
                                    break;
                                }
                                case 'delete': {
                                    this.nombreModal = 'Eliminación del Departamento';
                                    this.messageModal = 'Titulo del departamento';
                                    this.modalDpto = 3;
                                    this.modalGeneral = 1;
                                    this.nombreDpto = data['nombre'];
                                    this.idDpto = data['id'];
                                    break;
                                }
                            }
                            break;
                        }
                        case "cargo": {
                            switch (action) {
                                case 'create': {
                                    this.modalGeneral = 1;
                                    this.nombreModal = 'Creación de Cargo';
                                    this.messageModal = 'Ingrese el titulo del Cargo';
                                    this.modalCargo = 1;
                                    this.nombreCargo = '';
                                    this.errorNombreCargo = 0;
                                    this.idDptoCargo = this.dptos[0].id;
                                    break;
                                }
                                case 'update': {
                                    this.modalGeneral = 1;
                                    this.nombreModal = 'Modificacion del Cargo';
                                    this.messageModal = 'Ingrese el nuevo titulo';
                                    this.modalCargo = 2;
                                    this.nombreCargo = data['nombre'];
                                    this.idCargo = data['id'];
                                    this.errorNombreCargo = 0;
                                    this.idDptoCargo = data['dpto']['id'];
                                    break;
                                }
                                case 'delete': {
                                    this.modalGeneral = 1;
                                    this.nombreModal = 'Eliminacion de un Cargo';
                                    this.messageModal = 'Confirme';
                                    this.modalCargo = 3;
                                    this.nombreCargo = data['nombre'];
                                    this.idCargo = data['id'];
                                    this.errorNombreCargo = 0;
                                    this.idDptoCargo = data['dpto']['id'];
                                    break;
                                }
                            }
                            break;
                        }
                        case "funcionario": {
                            switch (action) {
                                case 'create': {
                                    this.modalGeneral = 1;
                                    this.nombreModal = 'Creación de Funcionario';
                                    this.messageModal = 'Ingrese los datos del Funcionario';
                                    this.modalFuncionario = 1;
                                    this.nameFuncionario = '';
                                    this.lastnameFuncionario = '';
                                    this.emailFuncionario = '';
                                    this.birthdayFuncionario = '';
                                    this.filterDpto = [];
                                    this.filterCargo = [];
                                    let me = this;
                                    this.dptos.map(function (x) {
                                        if (x.cargos.length) {
                                            if (me.filterDpto.indexOf(x)) me.filterDpto.push(x);
                                        }
                                    });
                                    if (this.filterDpto.length) {
                                        this.idFilterDpto = this.filterDpto[0].id;
                                        this.filterCargo = this.filterDpto[0].cargos;
                                        this.idFilterCargo = this.filterDpto[0].cargos[0].id;
                                    } else {
                                        this.idFilterDpto = 0;
                                        this.idFilterCargo = 0;
                                        this.filterCargo = [];
                                    }
                                    break;
                                }
                                case 'update': {
                                    this.modalGeneral = 1;
                                    this.nombreModal = 'Modificacion de Funcionario';
                                    this.messageModal = 'Cambie los datos del Funcionario';
                                    this.modalFuncionario = 2;
                                    this.nameFuncionario = data['name'];
                                    this.lastnameFuncionario = data['lastname'];
                                    this.emailFuncionario = data['email'];
                                    this.birthdayFuncionario = data['birthday'];
                                    this.filterDpto = [];
                                    this.filterCargo = [];
                                    this.idFuncionario = data['id'];
                                    let me = this;
                                    this.dptos.map(function (x) {
                                        if (x.cargos.length) {
                                            if (me.filterDpto.indexOf(x)) me.filterDpto.push(x);
                                        }
                                    });
                                    this.nowatch = data['cargo']['id'];
                                    this.idFilterDpto = data['dpto']['id'];
                                    break;
                                }
                                case 'delete': {
                                    this.modalGeneral = 1;
                                    this.nombreModal = 'Eliminacion de Funcionario';
                                    this.messageModal = 'Confirme los datos del Funcionario';
                                    this.modalFuncionario = 3;
                                    this.nameFuncionario = data['name'];
                                    this.lastnameFuncionario = data['lastname'];
                                    this.emailFuncionario = data['email'];
                                    this.birthdayFuncionario = data['birthday'];
                                    this.filterDpto = [];
                                    this.filterCargo = [];
                                    this.idFuncionario = data['id'];
                                   this.filterDpto=this.dptos;
                                    this.nowatch = data['cargo']['id'];
                                    this.idFilterDpto = data['dpto']['id'];
                                    break;
                                }
                            }
                            break;
                        }
                    }
                },
            },
        })
    </script>
@endsection