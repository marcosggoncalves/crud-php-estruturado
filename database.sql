
use frota;

CREATE TABLE veiculos (
	id INTEGER PRIMARY KEY auto_increment,
	placa_veiculo varchar(225),
	descricao_veiculo text,
  created_at timestamp default now(),
	updated_at timestamp  default now()
);

INSERT INTO veiculos (`placa_veiculo`,`descricao_veiculo`) VALUES ("ASD-23ER", "Veiculo de Viagem");