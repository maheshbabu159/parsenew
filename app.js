/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

'use strict';

angular.module('plunkerApp', [
 'ngRoute', // Incluindo o módulo `angular-route.js` no nosso app
 'keepr' // Incluindo o módulo `angular-keepr.js` no nosso app
])
 .config(function ($routeProvider) {
   $routeProvider
     // Rota padrão do nosso app; Enviará o usuário para a lista de contatos
     .when('/', {
       templateUrl: 'list.html',
       controller: 'ContactsCtrl'
     })
     // Rota padrão do nosso app; Enviará o usuário para a lista de contatos
     .when('/contacts', {
       templateUrl: 'list.html',
       controller: 'ContactsCtrl'
     })
     // Rota para criação de um novo contato
     .when('/contacts/new', {
       templateUrl: 'new.html',
       controller: 'ContactsCtrl'
     })
     // Rota para a edição de um contato existente
     .when('/contacts/:id/edit', {
       templateUrl: 'edit.html',
       controller: 'ContactsCtrl',
       method: 'edit'
     })
     // Redirecionamento, caso o usuário tente acessar uma rota não cadastrada
     .otherwise({
       redirectTo: '/'
     });
 });