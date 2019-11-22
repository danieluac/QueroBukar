/* VER LIVRO*/
CREATE or replace view Verlivro as
SELECT livro.id, livro.titulo, livro.edicao, livro.lancamento as ano, livro.quantidade, livro.prefacio, livro.processo,
livro.isbn, livro.foto, livro.categoria as idcategoria, categoria.nome as categoria, livro.editora as ideditora,
editora.nome as editora, livro.preco as idpreco, preco.nome as preco, livro.data

from livro JOIN categoria on (categoria.id=livro.categoria)
JOIN editora on (editora.id=livro.editora)
JOIN preco on (preco.id=livro.preco);
/* VIEW LIVRO */
CREATE or replace view viewlivro as
SELECT livro.id, livro.titulo, livro.edicao, livro.lancamento as ano, livro.quantidade, livro.prefacio, livro.processo,
livro.isbn, livro.foto, livro.categoria as idcategoria, categoria.nome as categoria, livro.editora as ideditora, editora.nome as editora, livro.preco as idpreco, preco.nome as preco,
autor.id as idautor, autor.nome as autor, livro.data
from livro JOIN categoria on (categoria.id=livro.categoria)
JOIN editora on (editora.id=livro.editora)
JOIN preco on (preco.id=livro.preco)
JOIN livro_tem_autor on (livro_tem_autor.livro_id=livro.id)
JOIN autor on (livro_tem_autor.autor_id=autor.id);
/* VIEW SOLICITAÇÃO INTERNA */
create or replace view solicitacaoInterna AS
SELECT solicitacao.id, usuario.id as idusuario, aluno.id as idaluno, aluno.pri_nome, aluno.ult_nome,
aluno.processo, curso.id as idcurso, curso.nome as curso, solicitacao.data_solicitado,
solicitacao.chavesolicitacao, solicitacao.quantidade, solicitacao.estado,
livro.id as idlivro, livro.titulo as livro, livro.preco as idpreco, preco.nome as precolivro
FROM usuario JOIN aluno on (usuario.id=aluno.usuario)
join solicitacao on (solicitacao.usuario=usuario.id)
JOIN livro on (livro.id=solicitacao.livro)
JOIN curso on (curso.id=aluno.curso)
JOIN preco on (preco.id=livro.preco);
/* VIEW SOLICITAÇÃO EXTERNA */
create or replace view solicitacaoExterna AS
SELECT solicitacao.id, usuario.id as idusuario, visitante.id as idvisitante, visitante.pri_nome, visitante.ult_nome,
visitante.bilhete, solicitacao.data_solicitado, solicitacao.chavesolicitacao, solicitacao.quantidade, solicitacao.estado,
livro.id as idlivro, livro.titulo as livro, livro.preco as idpreco, preco.nome as precolivro
FROM usuario JOIN visitante on (usuario.id=visitante.usuario)
join solicitacao on (solicitacao.usuario=usuario.id)
JOIN livro on (livro.id=solicitacao.livro)
JOIN preco on (preco.id=livro.preco);
/* VIEW ALUNO */
create or replace VIEW viewaluno AS
select aluno.id, aluno.pri_nome, aluno.ult_nome, aluno.sexo, aluno.processo, aluno.usuario as idusuario, aluno.curso as idcurso, curso.nome as curso
from aluno join curso on (curso.id=aluno.curso)
join usuario on (usuario.id=aluno.usuario)
ORDER by pri_nome ASC;
/* VIEW ALUNO USUARIO*/
create or replace VIEW viewalunoUsuario AS
select aluno.id, aluno.pri_nome, aluno.ult_nome, aluno.sexo, aluno.processo, aluno.usuario as idusuario, aluno.curso as idcurso, curso.nome as curso, usuario.estado, usuario.perfil
from aluno join curso on (curso.id=aluno.curso)
join usuario on (usuario.id=aluno.usuario)
ORDER by pri_nome ASC;
/* VIEW FUNCIONARIO */
create or replace view viewfuncionario as
select funcionario.id, funcionario.numero_agente, funcionario.pri_nome, funcionario.ult_nome, funcionario.usuario as idusuario
from funcionario JOIN usuario on (usuario.id=funcionario.usuario);
/*VIEW LIVRO LEITURA INTERNA*/
CREATE OR REPLACE VIEW viewlivroleituraInterna AS
select leitura.id, leitura.data_lida, leitura.hora_lida, leitura.data_devolvida, leitura.hora_devolvida, leitura.estado, leitura.obs, leitura.funcionario as idfuncionario, funcionario.numero_agente, funcionario.pri_nome as pri_nome_funcionario, funcionario.ult_nome as ult_nome_funcionario,
leitura.solicitacao as idsolicitacao, solicitacaointerna.livro, solicitacaointerna.idlivro,
solicitacaointerna.pri_nome as pri_nome_aluno, solicitacaointerna.ult_nome as ult_nome_aluno, solicitacaointerna.processo as processo_aluno, solicitacaointerna.curso, solicitacaointerna.quantidade as quantidade_solicitada
from leitura join solicitacaointerna on (solicitacaointerna.id=leitura.solicitacao)
join funcionario on (funcionario.id=leitura.funcionario);
/*VIEW LIVRO LEITURA EXTERNA*/
CREATE OR REPLACE VIEW viewlivroleituraExterna AS
select leitura.id, leitura.data_lida, leitura.hora_lida, leitura.data_devolvida, leitura.hora_devolvida, leitura.estado, leitura.obs, leitura.funcionario as idfuncionario, funcionario.numero_agente, funcionario.pri_nome as pri_nome_funcionario, funcionario.ult_nome as ult_nome_funcionario,
leitura.solicitacao as idsolicitacao, solicitacaoexterna.livro, solicitacaoexterna.idlivro,
solicitacaoexterna.pri_nome as pri_nome_visitante, solicitacaoexterna.ult_nome as ult_nome_visitante, solicitacaoexterna.bilhete as bilhete_visitante, solicitacaoexterna.quantidade as quantidade_solicitada
from leitura join solicitacaoexterna on (solicitacaoexterna.id=leitura.solicitacao)
join funcionario on (funcionario.id=leitura.funcionario);
/* VIEW LIVRO VENDIDO INTERNO*/
create or replace view viewlivrovendidointerno as
SELECT vendido.id, vendido.data_vendido, vendido.hora_vendido, vendido.quantidade_vendido, vendido.solicitacao as idsolicitacao, vendido.funcionario as idfuncionario, funcionario.numero_agente, funcionario.pri_nome as pri_nome_funcionario, funcionario.ult_nome as ult_nome_funcionario,
solicitacaointerna.pri_nome as pri_nome_aluno, solicitacaointerna.ult_nome as ult_nome_aluno,
solicitacaointerna.processo as processo_aluno, solicitacaointerna.curso, solicitacaointerna.livro, solicitacaointerna.idlivro,
preco.nome as preco_livro

FROM vendido join solicitacaointerna on (vendido.solicitacao=solicitacaointerna.id)
JOIN preco on (preco.id=solicitacaointerna.idpreco)
JOIN funcionario on (funcionario.id=vendido.funcionario);
/* VIEW LIVRO VENDIDO EXTERNO*/
create or replace view viewlivrovendidoexterno as
SELECT vendido.id, vendido.data_vendido, vendido.hora_vendido, vendido.quantidade_vendido, vendido.solicitacao as idsolicitacao, vendido.funcionario as idfuncionario, funcionario.numero_agente, funcionario.pri_nome as pri_nome_funcionario, funcionario.ult_nome as ult_nome_funcionario,
solicitacaoexterna.pri_nome as pri_nome_visitante, solicitacaoexterna.ult_nome as ult_nome_visitante,
solicitacaoexterna.bilhete as bilhete_visitante, solicitacaoexterna.livro, solicitacaoexterna.idlivro,
preco.nome as preco_livro

FROM vendido join solicitacaoexterna on (vendido.solicitacao=solicitacaoexterna.id)
JOIN preco on (preco.id=solicitacaoexterna.idpreco)
JOIN funcionario on (funcionario.id=vendido.funcionario);

/* VER COMENTARIO */
CREATE or replace view vercomentario as
select comentario.id, comentario.descricao, comentario.data, comentario.forum as idforum, comentario.usuario as idusuario,
 usuario.nome as processo, aluno.pri_nome, aluno.ult_nome, usuario.foto
FROM comentario JOIN usuario on (usuario.id=comentario.usuario)
JOIN aluno on (aluno.usuario=usuario.id);
/* ver forum*/
CREATE or replace view verforum as
select forum.id,forum.titulo, forum.descricao, forum.data, forum.categoria as idcategoria, forum.usuario as idusuario,
 usuario.nome as processo, aluno.pri_nome, aluno.ult_nome, usuario.foto, categoria.nome as categoria, forum.foto as fotoForum
FROM forum JOIN usuario on (usuario.id=forum.usuario)
JOIN aluno on (aluno.usuario=usuario.id)
JOIN categoria on (categoria.id=forum.categoria) order by forum.data desc;
