$(document).ready(function(){$('.slider').slider({full_width: true});
var H = $('.slider').height();
$('.slider').height(H-40);});
$(".button-collapse").sideNav({  edge: 'right'});
$(document).ready(function(){
    $('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
});
$('select').material_select();
$(function(){
    $('.pagination li:first-child').addClass('active');
});
$(function(){
    $('.paginations.pagincomms').click(function(e){
        e.preventDefault();
        var href = $(this).attr('href');
        $('.pagination li').removeClass('active');
        $(this).parent().removeClass('waves-effect').addClass('active');
        var data = {
            page: href
        }
        $.ajax({
            url: pageUrl,
            data: data,
            success: function(reponse) {
                $('.comments').empty();
                for (m in reponse) {
                    var h5 = ($('<h5>').addClass('center-align').text('Commentaire de'+' '+reponse[m].prenomUser+' '+reponse[m].nomUser));
                    var htmlcomms =
                    ($('<div>').attr('id', 'com-project').addClass('grey').addClass('lighten-2')
                    .append($('<h7>').text(reponse[m].titre))
                    .append($('<p>').text(reponse[m].comments))
                    .append($('<p>').addClass('date-publi').text('publié le'+' '+reponse[m].date)))
                    .insertAfter($('<h5>').addClass('center-align').text('Commentaire de'+' '+reponse[m].prenomUser+' '+reponse[m].nomUser))
                    $('.comments').append(h5).append(htmlcomms);
                }
            }
        })
    });
})
$(function(){
    $('.paginations.paginallprofiles').click(function(e){
        e.preventDefault();
        var href = $(this).attr('href');
        $('.pagination li').removeClass('active');
        $(this).parent().removeClass('waves-effect').addClass('active');
        var data = {
            page: href
        }
        $.ajax({
            url: pageUrl,
            data: data,
            success: function(reponse) {
                $('#allworks').empty();
                for (m in reponse) {
                  if (reponse[m].photo.length == 0) {
                    var img = '/philo_unity/public/assets/avatar/generic-avatar.png';
                  }
                  if (reponse[m].photo.length !== 0) {
                    var img = '/philo_unity/public/assets/'+reponse[m].photo;
                  }
                    var htmlProfils = $('<article>')
                    .addClass('col')
                    .addClass('l4')
                    .addClass('m6')
                    .addClass('s12')
                    .append($('<div>')
                        .addClass('grey')
                        .addClass('lighten-4')
                        .addClass('z-depth-1')
                        .append($('<div>').addClass('contain-img')
                            .append($('<img>').attr('src', img).addClass('photo-work').addClass('responsive-img').addClass('hov-zoom'))
                            .append($('<div>').addClass('text-box')
                            .append($('<h2>').text('Visiter le Profil').addClass('lighten-4'))
                            .append($('<a>').attr('href',  '/philo_unity/public/profil/profiluser/'+reponse[m].id).addClass('link-metier'))))
                        .append($('<div>').addClass('text-works')
                        .addClass('center')
                            .append($('<h6>').text(reponse[m].prenom+' '+reponse[m].nom))
                            .append($('<p>').text(reponse[m].description))))
                    $('#allworks').append(htmlProfils);
                }
            }
        })
    });
})
$(function(){
    $('.paginations.paginmet').click(function(e){
        e.preventDefault();
        var href = $(this).attr('href');
        $('.pagination li').removeClass('active');
        $(this).parent().removeClass('waves-effect').addClass('active');
        var data = {
            page: href
        }
        $.ajax({
            url: pageUrl,
            data: data,
            success: function(reponse) {
                $('#allworks').empty();
                for (m in reponse) {
                    var htmlMetier = $('<article>')
                    .addClass('col')
                    .addClass('l4')
                    .addClass('m6')
                    .addClass('s12')
                    .append($('<div>')
                    .addClass('grey')
                    .addClass('lighten-4')
                    .addClass('z-depth-1')
                        .append($('<div>')
                        .addClass('contain-img')
                            .append($('<img>').attr('src', reponse[m].photo).addClass('hov-zoom'))
                            .append($('<div>').addClass('text-box')
                            .append($('<h2>').text('Voir les profils').addClass('lighten-4'))
                        .append($('<a>').attr('href', '/philo_unity/public/metiers/'+reponse[m].alias+'/profilsall').addClass('link-metier'))))
                    .append($('<div>').addClass('text-works')
                    .addClass('center')
                        .append($('<h6>').text(reponse[m].section))
                        .append($('<p>').text(reponse[m].description))))
                    $('#allworks').append(htmlMetier);
                }
            }
        })
    });
})
$(function(){
    $('.paginations.paginprofil').click(function(e){
        e.preventDefault();
        var href = $(this).attr('href');
        $('.pagination li').removeClass('active');
        $(this).parent().removeClass('waves-effect').addClass('active');
        var data = {
            page: href
        }
        $.ajax({
            url: pageUrl,
            data: data,
            success: function(reponse) {
                $('#allworks').empty();
                for (m in reponse) {
                  if (reponse[m].photo.length == 0) {
                    var img = '/philo_unity/public/assets/avatar/generic-avatar.png';
                  }
                  if (reponse[m].photo.length !== 0) {
                    var img = '/philo_unity/public/assets/'+reponse[m].photo;
                  }
                    var htmlProfils = $('<article>')
                    .addClass('col')
                    .addClass('l4')
                    .addClass('m6')
                    .addClass('s12')
                    .append($('<div>')
                        .addClass('grey')
                        .addClass('lighten-4')
                        .addClass('z-depth-1')
                        .append($('<div>').addClass('contain-img')
                            .append($('<img>').attr('src', img).addClass('photo-work').addClass('responsive-img').addClass('hov-zoom'))
                            .append($('<div>').addClass('text-box')
                            .append($('<h2>').text('Visiter le Profil').addClass('lighten-4'))
                            .append($('<a>').attr('href',  '/philo_unity/public/profil/profiluser/'+reponse[m].id).addClass('link-metier'))))
                        .append($('<div>').addClass('text-works')
                        .addClass('center')
                            .append($('<h6>').text(reponse[m].prenom+' '+reponse[m].nom))
                            .append($('<p>').text(reponse[m].description))))
                    $('#allworks').append(htmlProfils);
                }
            }
        })
    });
})
